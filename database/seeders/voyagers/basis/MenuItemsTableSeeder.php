<?php

namespace Database\Seeders\voyagers\basis;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;
use TCG\Voyager\Models\Permission;

class MenuItemsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        $menu = Menu::where('name', 'admin')->firstOrFail();

        $menuItemParent = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Курсы',
            'url' => '',
            'target' => '_self',
            'icon_class' => 'voyager-study',
            'color' => null,
            'parent_id' => null,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Курсы',
            'url' => '',
            'route' => 'voyager.courses.index',
            'target' => '_self',
            'icon_class' => 'voyager-study',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Завершенные курсы',
            'url' => '',
            'route' => 'voyager.completed_courses.index',
            'target' => '_self',
            'icon_class' => 'voyager-study',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Программы курсов',
            'url' => '',
            'route' => 'voyager.course_programs.index',
            'target' => '_self',
            'icon_class' => 'voyager-window-list',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Программы',
            'url' => '',
            'route' => 'voyager.programs.index',
            'target' => '_self',
            'icon_class' => 'voyager-book',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'База Координаторов',
            'url' => '',
            'route' => 'voyager.managers.index',
            'target' => '_self',
            'icon_class' => 'voyager-people',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        $menuItemParent = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Уроки',
            'url' => '',
            'target' => '_self',
            'icon_class' => 'voyager-laptop',
            'color' => null,
            'parent_id' => null,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Список уроков',
            'url' => '',
            'route' => 'voyager.lessons.index',
            'target' => '_self',
            'icon_class' => 'voyager-laptop',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Материалы урока',
            'url' => '',
            'route' => 'voyager.materials.index',
            'target' => '_self',
            'icon_class' => 'voyager-paperclip',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

//        $menuItem = MenuItem::create([
//            'menu_id' => $menu->id,
//            'title' => 'Уроки / слушатели',
//            'url' => '',
//            'route' => 'voyager.lesson_students.index',
//            'target' => '_self',
//            'icon_class' => 'voyager-people',
//            'color' => null,
//            'parent_id' => $menuItemParent->id,
//            'order' => 1,
//        ]);


        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Ссылка на урок',
            'url' => '',
            'route' => 'voyager.lesson_links.index',
            'target' => '_self',
            'icon_class' => 'voyager-external',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Домашняя работа',
            'url' => '',
            'route' => 'voyager.homeworks.index',
            'target' => '_self',
            'icon_class' => 'voyager-pen',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Ответы на домашнюю работу',
            'url' => '',
            'route' => 'voyager.homework_answers.index',
            'target' => '_self',
            'icon_class' => 'voyager-pen',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Оценки за домашнюю работу',
            'url' => '',
            'route' => 'voyager.homework_student_mark.index',
            'target' => '_self',
            'icon_class' => 'voyager-pen',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        $menuItemParent = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Тесты',
            'url' => '',
            'target' => '_self',
            'icon_class' => 'voyager-check',
            'color' => null,
            'parent_id' => null,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Список Тестов',
            'url' => '',
            'route' => 'voyager.tests.index',
            'target' => '_self',
            'icon_class' => 'voyager-check',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Вопросы теста',
            'url' => '',
            'route' => 'voyager.test_questions.index',
            'target' => '_self',
            'icon_class' => 'voyager-check',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Ответы теста',
            'url' => '',
            'route' => 'voyager.test_answers.index',
            'target' => '_self',
            'icon_class' => 'voyager-check',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Прогресс',
            'url' => '',
            'route' => 'voyager.course_progress.index',
            'target' => '_self',
            'icon_class' => 'voyager-window-list',
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Меню',
            'url' => '',
            'route' => 'voyager.main_menu.index',
            'target' => '_self',
            'icon_class' => 'voyager-window-list',
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Сертификаты',
            'url' => '',
            'route' => 'voyager.course_certificates.index',
            'target' => '_self',
            'icon_class' => 'voyager-people',
            'color' => null,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Группы обучения',
            'url' => '',
            'route' => 'voyager.course_groups.index',
            'target' => '_self',
            'icon_class' => 'voyager-people',
            'color' => null,
            'order' => 1,
        ]);

//        $menuItem = MenuItem::create([
//            'menu_id' => $menu->id,
//            'title' => 'Слушатели',
//            'url' => '',
//            'route' => 'voyager.course_listeners.index',
//            'target' => '_self',
//            'icon_class' => 'voyager-people',
//            'color' => null,
//            'order' => 1,
//        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Тренеры',
            'url' => '',
            'route' => 'voyager.coaches.index',
            'target' => '_self',
            'icon_class' => 'voyager-people',
            'color' => null,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Аудитории',
            'url' => '',
            'route' => 'voyager.auditoriums.index',
            'target' => '_self',
            'icon_class' => 'voyager-company',
            'color' => null,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Календарь занятий',
            'url' => '',
            'route' => 'voyager.lesson_calendar.index',
            'target' => '_self',
            'icon_class' => 'voyager-alarm-clock',
            'color' => null,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Библиотека',
            'url' => '',
            'route' => 'voyager.libraries.index',
            'target' => '_self',
            'icon_class' => 'voyager-documentation',
            'color' => null,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Профили',
            'url' => '',
            'route' => 'voyager.users.index',
            'target' => '_self',
            'icon_class' => 'voyager-people',
            'color' => null,
            'parent_id' => null,
            'order' => 1,
        ]);

        $menuItemParent = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Опросы',
            'url' => '',
            'target' => '_self',
            'icon_class' => 'voyager-chat',
            'color' => null,
            'parent_id' => null,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Опросы',
            'url' => '',
            'route' => 'voyager.surveys.index',
            'target' => '_self',
            'icon_class' => 'voyager-chat',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Вопросы опроса',
            'url' => '',
            'route' => 'voyager.survey_questions.index',
            'target' => '_self',
            'icon_class' => 'voyager-chat',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Ответы опроса',
            'url' => '',
            'route' => 'voyager.survey_responses.index',
            'target' => '_self',
            'icon_class' => 'voyager-chat',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Уведомление',
            'url' => '',
            'route' => 'voyager.notifications.index',
            'target' => '_self',
            'icon_class' => 'voyager-chat',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        $menuItemParent = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Контент',
            'url' => '',
            'target' => '_self',
            'icon_class' => 'voyager-file-text',
            'color' => null,
            'parent_id' => null,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Новости',
            'url' => '',
            'route' => 'voyager.news.index',
            'target' => '_self',
            'icon_class' => 'voyager-news',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Текстовые страницы',
            'url' => '',
            'route' => 'voyager.pages.index',
            'target' => '_self',
            'icon_class' => 'voyager-file-text',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Обратная связь',
            'url' => '',
            'route' => 'voyager.feedback.index',
            'target' => '_self',
            'icon_class' => 'voyager-window-list',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'FAQ',
            'url' => '',
            'route' => 'voyager.faqs.index',
            'target' => '_self',
            'icon_class' => 'voyager-pen',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        $menuItemParent = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Справочники',
            'url' => '',
            'target' => '_self',
            'icon_class' => 'voyager-book',
            'color' => null,
            'parent_id' => null,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Типы направлений',
            'url' => '',
            'route' => 'voyager.handbook_direction_types.index',
            'target' => '_self',
            'icon_class' => 'voyager-book',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Аудитории',
            'url' => '',
            'route' => 'voyager.handbook_auditoriums.index',
            'target' => '_self',
            'icon_class' => 'voyager-book',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Библиотека-авторы',
            'url' => '',
            'route' => 'voyager.handbook_library_authors.index',
            'target' => '_self',
            'icon_class' => 'voyager-book',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Библиотека-категории',
            'url' => '',
            'route' => 'voyager.handbook_library_categories.index',
            'target' => '_self',
            'icon_class' => 'voyager-book',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Библиотека-издатели',
            'url' => '',
            'route' => 'voyager.handbook_library_publishers.index',
            'target' => '_self',
            'icon_class' => 'voyager-book',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Обратная связь',
            'url' => '',
            'route' => 'voyager.handbook_feedback.index',
            'target' => '_self',
            'icon_class' => 'voyager-book',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Новость: теги',
            'url' => '',
            'route' => 'voyager.handbook_news_tags.index',
            'target' => '_self',
            'icon_class' => 'voyager-book',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Заявка: тематики',
            'url' => '',
            'route' => 'voyager.handbook_request_subjects.index',
            'target' => '_self',
            'icon_class' => 'voyager-book',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Год',
            'url' => '',
            'route' => 'voyager.handbook_years.index',
            'target' => '_self',
            'icon_class' => 'voyager-book',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Типы сотрудников',
            'url' => '',
            'route' => 'voyager.handbook_employee_types.index',
            'target' => '_self',
            'icon_class' => 'voyager-book',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Уровни сотрудников',
            'url' => '',
            'route' => 'voyager.handbook_employee_levels.index',
            'target' => '_self',
            'icon_class' => 'voyager-book',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Топ уровни сотрудников',
            'url' => '',
            'route' => 'voyager.handbook_employee_top_levels.index',
            'target' => '_self',
            'icon_class' => 'voyager-book',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Страны',
            'url' => '',
            'route' => 'voyager.location_countries.index',
            'target' => '_self',
            'icon_class' => 'voyager-location',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Города',
            'url' => '',
            'route' => 'voyager.location_cities.index',
            'target' => '_self',
            'icon_class' => 'voyager-location',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        $menuItemParent = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Tools',
            'url' => '',
            'target' => '_self',
            'icon_class' => 'voyager-tools',
            'color' => null,
            'parent_id' => null,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Menu Builder',
            'url' => '',
            'route' => 'voyager.menus.index',
            'target' => '_self',
            'icon_class' => 'voyager-list',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Database',
            'url' => '',
            'route' => 'voyager.database.index',
            'target' => '_self',
            'icon_class' => 'voyager-data',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Compass',
            'url' => '',
            'route' => 'voyager.compass.index',
            'target' => '_self',
            'icon_class' => 'voyager-compass',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Bread',
            'url' => '',
            'route' => 'voyager.bread.index',
            'target' => '_self',
            'icon_class' => 'voyager-bread',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        $menuItemParent = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Настройки',
            'url' => '',
            'target' => '_self',
            'icon_class' => 'voyager-tools',
            'color' => null,
            'parent_id' => null,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Проект',
            'url' => '',
            'route' => 'voyager.settings.index',
            'target' => '_self',
            'icon_class' => 'voyager-settings',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'SEO',
            'url' => '',
            'route' => 'voyager.seo_pages.index',
            'target' => '_self',
            'icon_class' => 'voyager-wand',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Контакты',
            'url' => '',
            'route' => 'voyager.contacts.index',
            'target' => '_self',
            'icon_class' => 'voyager-world',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);

//        $menuItem = MenuItem::create([
//            'menu_id' => $menu->id,
//            'title' => 'База слушателей',
//            'url' => '',
//            'route' => 'voyager.users.index',
//            'target' => '_self',
//            'icon_class' => 'voyager-people',
//            'color' => null,
//            'parent_id' => $menuItemParent->id,
//            'order' => 1,
//        ]);
//
//        $menuItem = MenuItem::create([
//            'menu_id' => $menu->id,
//            'title' => 'Роли',
//            'url' => '',
//            'route' => 'voyager.roles.index',
//            'target' => '_self',
//            'icon_class' => 'voyager-lock',
//            'color' => null,
//            'parent_id' => $menuItemParent->id,
//            'order' => 1,
//        ]);

        $menuItem = MenuItem::create([
            'menu_id' => $menu->id,
            'title' => 'Медиа',
            'url' => '',
            'route' => 'voyager.media.index',
            'target' => '_self',
            'icon_class' => 'voyager-images',
            'color' => null,
            'parent_id' => $menuItemParent->id,
            'order' => 1,
        ]);
    }
}
