<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GambarLandingResource\Pages;
use App\Filament\Resources\GambarLandingResource\RelationManagers;
use App\Models\GambarLanding;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Enums\ActionsPosition;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GambarLandingResource extends Resource
{
    protected static ?string $model = GambarLanding::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Profile';
    protected static ?string $navigationLabel = 'Gambar Landing';
    protected static ?string $label = 'Gambar Landing';
    
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('gambar')
                    ->image()
                    ->directory('storage/')
                    ->required(),
                Forms\Components\TextInput::make('link')
                    ->required()
                    ->maxLength(255),
                // Forms\Components\TextInput::make('position')
                //     ->required()
                //     ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('gambar'),
                Tables\Columns\TextColumn::make('link')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                // Tables\Columns\TextColumn::make('position')
                //     ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
            Tables\Actions\ViewAction::make()->label(''),
            Tables\Actions\EditAction::make()->label(''),
            Tables\Actions\DeleteAction::make()->label(''),
            Tables\Actions\Action::make('order_up')->label('')
                ->icon('heroicon-o-arrow-up')
                ->action(function (GambarLanding $record) {
                    $currentOrder = $record->position;
                    $swapRecord = GambarLanding::where('position', $currentOrder - 1)->first();
                    if ($swapRecord) {
                        $record->position = 0;
                        $record->save();

                        $swapRecord->position = $currentOrder;
                        $swapRecord->save();

                        $record->position = $currentOrder-1;
                        $record->save();
                    }
                }),

            Tables\Actions\Action::make('order_down')->label('')
                ->icon('heroicon-o-arrow-down')
                ->action(function (GambarLanding $record) {
                    $currentOrder = $record->position;
                    $swapRecord = GambarLanding::where('position', $currentOrder + 1)->first();
                    if ($swapRecord) {
                        $record->position = 0;
                        $record->save();

                        $swapRecord->position = $currentOrder;
                        $swapRecord->save();

                        $record->position = $currentOrder+1;
                        $record->save();
                    }
                }),
        ], position: ActionsPosition::BeforeColumns)
            // ->bulkActions([
            //     Tables\Actions\BulkActionGroup::make([
            //         Tables\Actions\DeleteBulkAction::make(),
            //     ]),
            // ])
            ;
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGambarLandings::route('/'),
            'create' => Pages\CreateGambarLanding::route('/create'),
            'view' => Pages\ViewGambarLanding::route('/{record}'),
            'edit' => Pages\EditGambarLanding::route('/{record}/edit'),
        ];
    }
}
