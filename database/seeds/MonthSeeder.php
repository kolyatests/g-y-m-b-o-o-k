<?php

use Illuminate\Database\Seeder;

class MonthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['code' => '1', 'lang' => 'rus', 'text' => 'Январь', 'txt' => 'янв'],
            ['code' => '1', 'lang' => 'eng', 'text' => 'January', 'txt' => 'Jan'],
            ['code' => '1', 'lang' => 'deu', 'text' => 'Januar', 'txt' => 'Jan.'],
            ['code' => '1', 'lang' => 'spa', 'text' => 'Enero', 'txt' => 'Ene'],
            ['code' => '1', 'lang' => 'por', 'text' => 'Janeiro', 'txt' => 'Jan'],
            ['code' => '2', 'lang' => 'rus', 'text' => 'Февраль', 'txt' => 'февр'],
            ['code' => '2', 'lang' => 'eng', 'text' => 'February', 'txt' => 'Feb'],
            ['code' => '2', 'lang' => 'deu', 'text' => 'Februar', 'txt' => 'Febr.'],
            ['code' => '2', 'lang' => 'spa', 'text' => 'Febrero', 'txt' => 'Feb'],
            ['code' => '2', 'lang' => 'por', 'text' => 'Fevereiro', 'txt' => 'Fev'],
            ['code' => '3', 'lang' => 'rus', 'text' => 'Март', 'txt' => 'март'],
            ['code' => '3', 'lang' => 'eng', 'text' => 'March', 'txt' => 'Mar'],
            ['code' => '3', 'lang' => 'deu', 'text' => 'März', 'txt' => 'März'],
            ['code' => '3', 'lang' => 'spa', 'text' => 'Marzo', 'txt' => 'Mar'],
            ['code' => '3', 'lang' => 'por', 'text' => 'Março', 'txt' => 'Mar'],
            ['code' => '4', 'lang' => 'rus', 'text' => 'Апрель', 'txt' => 'апр'],
            ['code' => '4', 'lang' => 'eng', 'text' => 'April', 'txt' => 'Apr'],
            ['code' => '4', 'lang' => 'deu', 'text' => 'April', 'txt' => 'Apr.'],
            ['code' => '4', 'lang' => 'spa', 'text' => 'Abril', 'txt' => 'Abr'],
            ['code' => '4', 'lang' => 'por', 'text' => 'Abril', 'txt' => 'Abr'],
            ['code' => '5', 'lang' => 'rus', 'text' => 'Май', 'txt' => 'мая'],
            ['code' => '5', 'lang' => 'eng', 'text' => 'May', 'txt' => 'May'],
            ['code' => '5', 'lang' => 'deu', 'text' => 'Mai', 'txt' => 'Mai'],
            ['code' => '5', 'lang' => 'spa', 'text' => 'Mayo', 'txt' => 'May'],
            ['code' => '5', 'lang' => 'por', 'text' => 'Maio', 'txt' => 'Mai'],
            ['code' => '6', 'lang' => 'rus', 'text' => 'Июнь', 'txt' => 'июня'],
            ['code' => '6', 'lang' => 'eng', 'text' => 'June', 'txt' => 'Jun'],
            ['code' => '6', 'lang' => 'deu', 'text' => 'Juni', 'txt' => 'Juni'],
            ['code' => '6', 'lang' => 'spa', 'text' => 'Junio', 'txt' => 'Jun'],
            ['code' => '6', 'lang' => 'por', 'text' => 'Junho', 'txt' => 'Jun'],
            ['code' => '7', 'lang' => 'rus', 'text' => 'Июль', 'txt' => 'июля'],
            ['code' => '7', 'lang' => 'eng', 'text' => 'July', 'txt' => 'Jul'],
            ['code' => '7', 'lang' => 'deu', 'text' => 'Juli', 'txt' => 'Juli'],
            ['code' => '7', 'lang' => 'spa', 'text' => 'Julio', 'txt' => 'Jul'],
            ['code' => '7', 'lang' => 'por', 'text' => 'Julho', 'txt' => 'Jul'],
            ['code' => '8', 'lang' => 'rus', 'text' => 'Август', 'txt' => 'авг'],
            ['code' => '8', 'lang' => 'eng', 'text' => 'August', 'txt' => 'Aug'],
            ['code' => '8', 'lang' => 'deu', 'text' => 'August', 'txt' => 'Aug.'],
            ['code' => '8', 'lang' => 'spa', 'text' => 'Agosto', 'txt' => 'Ago'],
            ['code' => '8', 'lang' => 'por', 'text' => 'Agosto', 'txt' => 'Ago'],
            ['code' => '9', 'lang' => 'rus', 'text' => 'Сентябрь', 'txt' => 'сент'],
            ['code' => '9', 'lang' => 'eng', 'text' => 'September', 'txt' => 'Sept'],
            ['code' => '9', 'lang' => 'deu', 'text' => 'September', 'txt' => 'Sept.'],
            ['code' => '9', 'lang' => 'spa', 'text' => 'Septiembre', 'txt' => 'Sept'],
            ['code' => '9', 'lang' => 'por', 'text' => 'Setembro', 'txt' => 'Set'],
            ['code' => '10', 'lang' => 'rus', 'text' => 'Октябрь', 'txt' => 'окт'],
            ['code' => '10', 'lang' => 'eng', 'text' => 'October', 'txt' => 'Oct'],
            ['code' => '10', 'lang' => 'deu', 'text' => 'Oktober', 'txt' => 'Okt.'],
            ['code' => '10', 'lang' => 'spa', 'text' => 'Octubre', 'txt' => 'Oct'],
            ['code' => '10', 'lang' => 'por', 'text' => 'Outubro', 'txt' => 'Out'],
            ['code' => '11', 'lang' => 'rus', 'text' => 'Ноябрь', 'txt' => 'нояб'],
            ['code' => '11', 'lang' => 'eng', 'text' => 'November', 'txt' => 'Nov'],
            ['code' => '11', 'lang' => 'deu', 'text' => 'November', 'txt' => 'Nov.'],
            ['code' => '11', 'lang' => 'spa', 'text' => 'Noviembre', 'txt' => 'Nov'],
            ['code' => '11', 'lang' => 'por', 'text' => 'Novembro', 'txt' => 'Nov'],
            ['code' => '12', 'lang' => 'rus', 'text' => 'Декабрь', 'txt' => 'дек'],
            ['code' => '12', 'lang' => 'eng', 'text' => 'December', 'txt' => 'Dec'],
            ['code' => '12', 'lang' => 'deu', 'text' => 'Dezember', 'txt' => 'Dez.'],
            ['code' => '12', 'lang' => 'spa', 'text' => 'Diciembre', 'txt' => 'Dic'],
            ['code' => '12', 'lang' => 'por', 'text' => 'Dezembro', 'txt' => 'Dez'],

        ];
        DB::table('sport_months')->insert($data);
    }
}
