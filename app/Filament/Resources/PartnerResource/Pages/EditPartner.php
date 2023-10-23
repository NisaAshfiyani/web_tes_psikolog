<?php

namespace App\Filament\Resources\PartnerResource\Pages;
use App\Models\partner;
use App\Filament\Resources\PartnerResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\SUpport\Facades\Storage;

class EditPartner extends EditRecord
{
    protected static string $resource = PartnerResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make()->after(
                function(partner $record){
                    if ($record->thumbnail){
                        Storage::disk('public')->delete($record->thumbnail); 
                    }
                }
            ),
        ];
    }
}
