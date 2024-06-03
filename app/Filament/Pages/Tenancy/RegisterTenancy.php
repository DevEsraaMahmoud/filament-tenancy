<?php

namespace App\Filament\Pages\Tenancy;

use App\Models\Tenancy;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Tenancy\RegisterTenant;

class RegisterTenancy extends RegisterTenant
{
    public static function getLabel(): string
    {
        return 'Register tenancy';
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name'),
                TextInput::make('slug'),
            ]);
    }

    protected function handleRegistration(array $data): Tenancy
    {
        $tenancy = Tenancy::create($data);

        $tenancy->members()->attach(auth()->user());

        return $tenancy;
    }
}