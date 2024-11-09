<?php

namespace App\Filament\Resources\PartnerResource\Pages;

use App\Filament\Resources\PartnerResource;
use App\Models\partner;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;

class EditPartner extends EditRecord
{
    protected static string $resource = PartnerResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make()->after( // saat hapus menggunakan fitur ini semua data terhapus begitu juga gambarnya
                function (partner $record) { // Gunakan ModelsSection
                    if ($record->thumbnail) {
                        Storage::disk('public')->delete($record->thumbnail); // Gunakan Storage facade
                    }
                }
            ),
        ];
    }
}
