<?php

namespace App\Filament\Pages\Tenancy;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\Tenancy\EditTenantProfile;

class EditTenancyProfile extends EditTenantProfile
{
    public static function getLabel(): string
    {
        return 'Tenancy profile';
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name'),
                TextInput::make('slug'),
                FileUpload::make('avatar_url')
                ->label('Upload Image')
                ->disk('FILAMENT_FILESYSTEM_DISK')
                // ->directory('images/avatars')
                ->image()
                ->imageEditor(),
            ]);
    }
}