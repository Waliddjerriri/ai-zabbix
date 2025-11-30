<?php
/*
** Copyright (C) 2001-2025 initMAX s.r.o.
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

/**
 * ChatGPT widget view.
 *
 * @var CView $this
 * @var array $data
 */

use Modules\ChatGPT\Services\WidgetTranslator;

(new CWidgetView($data))
    ->addItem(
        (new CDiv([
            (new CDiv([
                (new CImg($this->getAssetsPath() . '/img/initmax.svg', 'Logo of initMAX s.r.o.'))
                    ->addStyle('height: 2.5rem;')
                ,    
            ]))
                ->addClass('chat-header')
            ,
            (new CDiv())
                ->setId('chat-log')
                ->addClass('chat-log')
            ,
            (new CDiv([
                (new CInput('text'))
                    ->addClass('chat-form-message')
                    ->setAttribute('placeholder', WidgetTranslator::translate('view.message.placeholder'))
                ,
                (new CButton('stop-button', '◼'))
                    ->addClass('chat-form-button-stop')
                    ->addClass('chat-form-button-stop--hidden')
                    ->setAttribute('type', 'button')
                ,
                (new CButton('send-button', '➜'))
                    ->addClass('chat-form-button')
                    ->setAttribute('type', 'submit')
                ,
                ]))
                ->addClass('chat-form')
            ,
        ]))
        ->setId('chat-container')
        ->addClass('chat-container')
    )
->show();
