# bt_testproject
Необходимо создать простое приложение с использованием Yii Framework 2.x 
для хранения и отображения информации о пользователях и адресах доставки для каждого пользователя. 
Адресов у каждого пользователя может быть несколько (обязательно - минимум один адрес).

Данные пользователя:

логин (не менее 4 символов), уникальный
пароль (не менее 6 символов)
имя (обязательно с большой буквы)
фамилия (обязательно с большой буквы)
пол (3 значения - мужской, женский, нет информации - использовать константы)
дата создания (использовать стандарт ISO 8601 при сохранении значения в базу, при отображении приводить к виду “ДД-ММ-ГГГГ ЧЧ:ММ”)
e-mail, уникальный
Все поля обязательны.

Данные адреса:

почтовый индекс (только цифры, может начинаться с нуля, например “04001”)
страна (2-х буквенный код, только верхний регистр)
название города
название улицы
номер дома
номер офиса/квартиры
Все поля, кроме номера офиса/квартиры обязательны для заполнения.

Обязательные страницы:

Список пользователей с постраничной навигацией. Фильтрация приветствуется, но не обязательна.
Действия для пользователей - редактирование, удаление.
Страница добавления пользователя (должна содержать 2 формы - данные пользователя и адрес, т.к. у нас
не может быть пользователей без адресов)
Страница с информацией о выбранном пользователе - содержит данные пользователя и список 
его адресов (обязательно с постраничной навигацией, размер страницы результатов - 5). 
Действия для адресов - добавление, редактирование, удаление.
Добавление/обновление/удаление записей должно производиться только через POST-запрос.

Желательно оформление страниц с использованием Bootstrap (приветствуется применение yii2-bootstrap).

Требования по хранению данных. В зависимости от того, с чем у вас больше опыта напишите приложение
с использованием MySQL / PostgreSQL или MongoDB. Для sql-версии обязательно наличие дампа базы данных. 
Для MongoDB - миграция с настройками индексов для коллекций.
