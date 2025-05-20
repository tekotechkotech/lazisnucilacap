<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MisiResource\Pages;
use App\Filament\Resources\MisiResource\RelationManagers;
use App\Models\Misi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Enums\ActionsPosition;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MisiResource extends Resource
{
    protected static ?string $model = Misi::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Profile';
    
    protected static ?string $navigationLabel = 'Misi';
    protected static ?string $label = 'Misi';
    protected static ?int $navigationSort = 3;
    
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Textarea::make('misi')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->actions([
            Tables\Actions\ViewAction::make()->label(''),
            Tables\Actions\EditAction::make()->label(''),
            Tables\Actions\DeleteAction::make()->label(''),
            Tables\Actions\Action::make('order_up')->label('')
                ->icon('heroicon-o-arrow-up')
                ->action(function (Misi $record) {
                    $currentOrder = $record->order;
                    $swapRecord = Misi::where('order', $currentOrder - 1)->first();
                    if ($swapRecord) {
                        $record->order = 0;
                        $record->save();

                        $swapRecord->order = $currentOrder;
                        $swapRecord->save();

                        $record->order = $currentOrder-1;
                        $record->save();
                    }
                }),

            Tables\Actions\Action::make('order_down')->label('')
                ->icon('heroicon-o-arrow-down')
                ->action(function (Misi $record) {
                    $currentOrder = $record->order;
                    $swapRecord = Misi::where('order', $currentOrder + 1)->first();
                    if ($swapRecord) {
                        $record->order = 0;
                        $record->save();

                        $swapRecord->order = $currentOrder;
                        $swapRecord->save();

                        $record->order = $currentOrder+1;
                        $record->save();
                    }
                }),
        ], position: ActionsPosition::BeforeColumns)
            ->columns([
                Tables\Columns\TextColumn::make('misi')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                ])
                //
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
            'index' => Pages\ListMisis::route('/'),
            'create' => Pages\CreateMisi::route('/create'),
            'view' => Pages\ViewMisi::route('/{record}'),
            'edit' => Pages\EditMisi::route('/{record}/edit'),
        ];
    }
}
