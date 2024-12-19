<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Leader;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\TextArea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\LeaderResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\LeaderResource\RelationManagers;
use Filament\Resources\Concerns\Translatable;

class LeaderResource extends Resource
{
    use Translatable;

    protected static ?string $model = Leader::class;

    protected static ?string $navigationIcon = 'heroicon-o-pencil-alt';

    protected static ?string $navigationGroup = 'About Page';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    TextInput::make('title')
                        ->required()
                        ->maxLength(255)->label('Title One'),

                    TextInput::make('name')->required()
                        ->maxLength(255)
                        ->label('Title Two'),

                    TextInput::make('position')
                        ->maxLength(255)
                        ->label('Title Three'),

                    Forms\Components\Textarea::make('sub_title')
                        ->required()
                        ->label('Description One'),
                    Forms\Components\Textarea::make('description')
                        ->required()
                        ->label('Description Two'),

                Forms\Components\Textarea::make('gif_image')
                    ->required()
                    ->label('Description Three'),

                    FileUpload::make('image')->required()->image(),
//                    FileUpload::make('video_image')->required()->image(),
                    TextInput::make('video_link'),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->sortable()->searchable(),
                TextColumn::make('title')->limit(50)->searchable()->label('Title One'),
                TextColumn::make('name')->limit(50)->searchable()->label('Title Two'),
                TextColumn::make('position')->limit(50)->searchable()->label('Title Three'),
                TextColumn::make('sub_title')->limit(50)->searchable()->label('Description One'),
                TextColumn::make('description')->limit(50)->searchable()->label('Description Two'),
                TextColumn::make('gif_image')->limit(50)->searchable()->label('Description Three'),
                ImageColumn::make('image'),
                TextColumn::make('video_link')->limit(50)->searchable(),
                TextColumn::make('created_at')
                    ->dateTime(),
                TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->defaultSort('id', 'desc')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
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
            'index' => Pages\ListLeaders::route('/'),
            'create' => Pages\CreateLeader::route('/create'),
            'edit' => Pages\EditLeader::route('/{record}/edit'),
        ];
    }
}
