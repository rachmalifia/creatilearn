<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Course;
use App\Models\Subject;
use App\Models\Question;
use App\Models\Group;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Administrator',
            'username' => 'administrator',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'type' => '0'
        ]);

        User::create([
            'name' => 'Guru Satu',
            'username' => 'gurusatu',
            'email' => 'gurusatu@gmail.com',
            'password' => bcrypt('password'),
            'type' => '1'
        ]);

        User::create([
            'name' => 'Guru Dua',
            'username' => 'gurudua',
            'email' => 'gurudua@gmail.com',
            'password' => bcrypt('password'),
            'type' => '1'
        ]);

        User::create([
            'name' => 'Siswa Satu',
            'username' => 'siswasatu',
            'email' => 'siswasatu@gmail.com',
            'password' => bcrypt('password'),
            'type' => '2'
        ]);

        User::create([
            'name' => 'Siswa Dua',
            'username' => 'siswadua',
            'email' => 'siswadua@gmail.com',
            'password' => bcrypt('password'),
            'type' => '2'
        ]);

        Course::create([
            'title' => 'Basis Data',
            'slug' => 'basis-data',
            'grade' => 'Kelas 11'
        ]);

        Course::create([
            'title' => 'Pemrograman Berorientasi Objek',
            'slug' => 'pemrograman-berorientasi-objek',
            'grade' => 'Kelas 11'
        ]);

        Course::create([
            'title' => 'Matematika',
            'slug' => 'matematika',
            'grade' => 'Kelas 10'
        ]);

        Subject::create([
            'course_id' => '1',
            'title' => 'Diagram Hubungan antar Entitas',
            'highlight' => 'Entitas, Atribut, dan Relasi',
            'slug' => 'diagram-hubungan-antar-entitas',
            'url_video' => 'https://www.youtube.com/embed/LyfrTvsYTFE',
            'url_pdf' => 'https://drive.google.com/file/d/1J7ycvqVBrSyx-Sb1P0jamGKj-kWtxLP3/preview'

        ]);

        Subject::create([
            'course_id' => '1',
            'title' => 'DDL dan DML',
            'highlight' => 'SQL query',
            'slug' => 'ddl-dan-dml',
            'url_video' => 'https://www.youtube.com/embed/I-MfB6K0TRM',
            'url_pdf' => 'https://drive.google.com/file/d/1lzco_3YsOIjeA6IsKzi0_OLEJof6Cheg/preview'

        ]);

        Question::create([
            'subject_id' => '1',
            'code' => 'quiz',
            'question' => 'kuis 1',
            'option_a' => 'a',
            'option_b' => 'b',
            'option_c' => 'kj',
            'option_d' => 'c',
            'option_e' => 'd',
            'answer_key' => 'c',
            'point' => '10.00'
        ]);

        Question::create([
            'subject_id' => '1',
            'code' => 'quiz',
            'question' => 'kuis 2',
            'option_a' => 'a',
            'option_b' => 'b',
            'option_c' => 'c',
            'option_d' => 'kj',
            'option_e' => 'e',
            'answer_key' => 'd',
            'point' => '20.00'
        ]);

        Question::create([
            'subject_id' => '1',
            'code' => 'quiz',
            'question' => 'kuis 3',
            'option_a' => 'a',
            'option_b' => 'b',
            'option_c' => 'c',
            'option_d' => 'd',
            'option_e' => 'kj',
            'answer_key' => 'e',
            'point' => '50.00'
        ]);

        Question::create([
            'subject_id' => '1',
            'code' => 'pretest',
            'question' => 'pretest 1',
            'option_a' => 'kj',
            'option_b' => 'b',
            'option_c' => 'c',
            'option_d' => 'd',
            'option_e' => 'e',
            'answer_key' => 'a',
            'point' => '10.00'
        ]);

        Question::create([
            'subject_id' => '1',
            'code' => 'pretest',
            'question' => 'pretest 2',
            'option_a' => 'a',
            'option_b' => 'kj',
            'option_c' => 'c',
            'option_d' => 'd',
            'option_e' => 'e',
            'answer_key' => 'b',
            'point' => '10.00'
        ]);

        Question::create([
            'subject_id' => '1',
            'code' => 'pretest',
            'question' => 'pretest 3',
            'option_a' => 'a',
            'option_b' => 'b',
            'option_c' => 'kj',
            'option_d' => 'd',
            'option_e' => 'e',
            'answer_key' => 'c',
            'point' => '20.00'
        ]);

        Question::create([
            'subject_id' => '1',
            'code' => 'posttest',
            'question' => 'posttest 1',
            'option_a' => 'a',
            'option_b' => 'kj',
            'option_c' => 'c',
            'option_d' => 'd',
            'option_e' => 'e',
            'answer_key' => 'b',
            'point' => '10.00'
        ]);

        Question::create([
            'subject_id' => '1',
            'code' => 'posttest',
            'question' => 'posttest 2',
            'option_a' => 'a',
            'option_b' => 'kj',
            'option_c' => 'c',
            'option_d' => 'd',
            'option_e' => 'e',
            'answer_key' => 'b',
            'point' => '10.00'
        ]);

        Question::create([
            'subject_id' => '1',
            'code' => 'posttest',
            'question' => 'posttest 3',
            'option_a' => 'a',
            'option_b' => 'kj',
            'option_c' => 'c',
            'option_d' => 'd',
            'option_e' => 'e',
            'answer_key' => 'b',
            'point' => '40.00'
        ]);

        Group::create([
            'course_id' => '1',
            'name' => 'Kelompok 1',
        ]);
    }
}
