<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MataKuliahResource\Pages;
use App\Models\MataKuliah;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MataKuliahResource extends Resource
{
    protected static ?string $model = MataKuliah::class;
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationLabel = 'Mata Kuliah';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('kode_mk')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nama_mk')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('sks')
                    ->required()
                    ->numeric()
                    ->minValue(1)
                    ->maxValue(6),
                Forms\Components\TextInput::make('semester')
                    ->required()
                    ->numeric()
                    ->minValue(1)
                    ->maxValue(8),
                Forms\Components\Select::make('program_studi')
                    ->required()
                    ->options([
                        'Teknik Informatika' => 'Teknik Informatika',
                        'Sistem Informasi' => 'Sistem Informasi',
                    ]),
                Forms\Components\Textarea::make('deskripsi')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('status_aktif')
                    ->required(),
                Forms\Components\FileUpload::make('silabus_file')
                    ->directory('silabus')
                    ->acceptedFileTypes(['application/pdf']),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kode_mk')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nama_mk')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sks')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('semester')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('program_studi')
                    ->searchable(),
                Tables\Columns\IconColumn::make('status_aktif')
                    ->boolean(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('program_studi')
                    ->options([
                        'Teknik Informatika' => 'Teknik Informatika',
                        'Sistem Informasi' => 'Sistem Informasi',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMataKuliahs::route('/'),
            'create' => Pages\CreateMataKuliah::route('/create'),
            'edit' => Pages\EditMataKuliah::route('/{record}/edit'),
        ];
    }
}