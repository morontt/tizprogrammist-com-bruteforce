Проверка сайта [tizprogrammist.com](http://tizprogrammist.com/) на устойчивость :)

![matrix](https://raw.githubusercontent.com/morontt/tizprogrammist-com-bruteforce/master/tiz.png "Матрица имеет тебя")

Подготовка словаря для перебора. Предположим, что крутокодер продвинутый, и не использует 2-х и 3-хзначные пароли.
Начнём перебор с самых простых, т.е. без верхнего регистра, цифр и спецсимволов, четырёхбуквенных (и больше) паролей.

Воспользуемся этой [базой паролей](https://github.com/morontt/ten-million-passwords).

    SELECT `password` FROM `pass` WHERE `password` REGEXP "^[a-z]{4}$" ORDER BY `id`
    INTO OUTFILE '/tmp/dict.csv'
    FIELDS TERMINATED BY ','
    ENCLOSED BY ''
    LINES TERMINATED BY '\n';

Переносим получившийся файл словаря к скрипту и запускаем.

**P.S.** Не думал, что мне так повезёт, но пароль оказался в моих руках меньше, чем за минуту... Не используйте простые
пароли.

![fail](https://raw.githubusercontent.com/morontt/tizprogrammist-com-bruteforce/master/xyjak.png "Акт вандализма")
