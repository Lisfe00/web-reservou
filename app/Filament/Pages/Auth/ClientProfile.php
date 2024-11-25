<?php

namespace App\Filament\Pages\Auth;

use App\Enums\RolesEnum;
use App\Models\Role;
use App\Models\User;
use Filament\Events\Auth\Registered;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Ramsey\Uuid\Nonstandard\Uuid;
use Filament\Http\Responses\Auth\Contracts\RegistrationResponse;
use Filament\Notifications\Notification;
use Filament\Pages\Auth\Register;
use Illuminate\Support\Facades\DB;

use Override;

class ClientProfile extends Register{

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                $this->getNameFormComponent(),
                $this->getEmailFormComponent(),
                $this->getPhoneFormComponent(),
                $this->getCpfComponent(),
                $this->getPasswordFormComponent(),
                $this->getPasswordConfirmationFormComponent(),
            ]);
    }

    #[Override]
    public function register(): ?RegistrationResponse
    {

        $data = $this->form->getState();

        // $data['password'] = bcrypt(Uuid::uuid4());

        // verifica se o usário já existe
        // #TODO: criar a regra para não duplicar cadastros
        if( $this->existingUser($data) ) return null;

        $user = $this->getUserModel()::create($data);

        $role = Role::where('name', RolesEnum::CLIENT)->first();
        
        DB::table('model_has_roles')->insert([
            'model_id' => $user->id,
            'model_type' => User::class,
            'role_id' => $role->id
        ]);

        event(new Registered($user));

        Notification::make()
            ->title('Cadastro relaizado com sucesso!')
            ->success()
            ->send();

        session()->regenerate();

        return app(RegistrationResponse::class);

    }

    protected function getPhoneFormComponent(): Component
    {
        return TextInput::make('phone')
            ->label('Telefone')
            ->mask('(99) 99999-9999')
            ->required();
    }

    protected function getCpfComponent(): Component
    {
        return TextInput::make('cpf')
            ->label('CPF')
            ->mask('999.999.999-99')
            ->required();
    }

    protected function existingUser(array $data): bool
    {
        $existingUser = User::where('email', $data['email'])->first();

        if ($existingUser && ($existingUser->email === $data['email'] )) {
            Notification::make('register_error')
                ->title('Este usuário já esta em uso!')
                ->body('Seu E-mail ou Nome já estão em uso!')
                ->danger()
                ->persistent()
                ->send();
            return true;
        }
        return false;
    }
}