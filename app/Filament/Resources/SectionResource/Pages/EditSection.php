<?php

namespace App\Filament\Resources\SectionResource\Pages;

use App\Filament\Resources\SectionResource;
use App\Models\Section as ModelsSection;
use Filament\Forms\Components\Section;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage; // Pastikan untuk mengimpor Storage

class EditSection extends EditRecord
{
    protected static string $resource = SectionResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make()->after( // saat hapus menggunakan fitur ini semua data terhapus begitu juga gambarnya
                function (ModelsSection $record) { // Gunakan ModelsSection
                    if ($record->thumbnail) {
                        Storage::disk('public')->delete($record->thumbnail); // Gunakan Storage facade
                    }
                }
            ),
        ];
    }
}
