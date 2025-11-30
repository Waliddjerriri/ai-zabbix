<?php
/*
** Copyright (C) 2021-2025 initMAX s.r.o.
**
** This program is free software: you can redistribute it and/or modify it under the terms of
** the GNU Affero General Public License as published by the Free Software Foundation, version 3.
**
** This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
** without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
** See the GNU Affero General Public License for more details.
**
** You should have received a copy of the GNU Affero General Public License along with this program.
** If not, see <https://www.gnu.org/licenses/>.
**/


namespace Modules\ChatGPT\Type;

enum OpenAIModelType: int
{
    const __default = self::MODEL_GPT41;

    case MODEL_GPT41 = 0;
    case MODEL_GPT41MINI = 1;
    case MODEL_GPT41NANO = 2;
    case MODEL_GPT4O = 3;
    case MODEL_GPT4OMINI = 4;
    case MODEL_GPT4 = 5;
    case MODEL_GPT4TURBO = 6;
    case MODEL_GPT35TURBO = 7;
    case MODEL_O4MINI = 8;
    case MODEL_O3 = 9;
    case MODEL_O3PRO = 10;
    case MODEL_O3MINI = 11;
    case MODEL_O1 = 12;
    case MODEL_O1PRO = 13;
    case MODEL_O1MINI = 14;

    public function getName(): string
    {
        return match ($this) {
            self::MODEL_GPT41 => 'GPT-4.1',
            self::MODEL_GPT41MINI => 'GPT-4.1 Mini',
            self::MODEL_GPT41NANO => 'GPT-4.1 Nano',
            self::MODEL_GPT4O => 'GPT-4o',
            self::MODEL_GPT4OMINI => 'GPT-4o Mini',
            self::MODEL_GPT4 => 'GPT-4',
            self::MODEL_GPT4TURBO => 'GPT-4 Turbo',
            self::MODEL_GPT35TURBO => 'GPT-3.5 Turbo',
            self::MODEL_O4MINI => 'o4 Mini',
            self::MODEL_O3 => 'o3',
            self::MODEL_O3PRO => 'o3-pro',
            self::MODEL_O3MINI => 'o3-mini',
            self::MODEL_O1 => 'o1',
            self::MODEL_O1PRO => 'o1-pro',
            self::MODEL_O1MINI => 'o1-mini',
        };
    }

    public function getModelId(): string
    {
        return match ($this) {
            self::MODEL_GPT41 => 'gpt-4.1',
            self::MODEL_GPT41MINI => 'gpt-4.1-mini',
            self::MODEL_GPT41NANO => 'gpt-4.1-nano',
            self::MODEL_GPT4O => 'gpt-4o',
            self::MODEL_GPT4OMINI => 'gpt-4o-mini',
            self::MODEL_GPT4 => 'gpt-4',
            self::MODEL_GPT4TURBO => 'gpt-4-turbo',
            self::MODEL_GPT35TURBO => 'gpt-3.5-turbo',
            self::MODEL_O4MINI => 'o4-mini',
            self::MODEL_O3 => 'o3',
            self::MODEL_O3PRO => 'o3-pro',
            self::MODEL_O3MINI => 'o3-mini',
            self::MODEL_O1 => 'o1',
            self::MODEL_O1PRO => 'o1-pro',
            self::MODEL_O1MINI => 'o1-mini',
        };
    }

    public function fromInt(int $value): OpenAIModelType
    {
        return match ($value) {
            0 => self::MODEL_GPT41,
            1 => self::MODEL_GPT41MINI,
            2 => self::MODEL_GPT41NANO,
            3 => self::MODEL_GPT4O,
            4 => self::MODEL_GPT4OMINI,
            5 => self::MODEL_GPT4,
            6 => self::MODEL_GPT4TURBO,
            7 => self::MODEL_GPT35TURBO,
            8 => self::MODEL_O4MINI,
            9 => self::MODEL_O3,
            10 => self::MODEL_O3PRO,
            11 => self::MODEL_O3MINI,
            12 => self::MODEL_O1,
            13 => self::MODEL_O1PRO,
            14 => self::MODEL_O1MINI,
            default => throw new \InvalidArgumentException('Invalid OpenAIModelType value: ' . $value),
        };
    }

    public static function toArray(): array {
        return array_reduce(static::cases(), fn ($result, $value) => $result + [$value->value => $value->getName()], []);
    }
}
