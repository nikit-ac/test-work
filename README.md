# test-work
Задание заключается в написании обработчика списков фраз - удаление дубликатов.
Требования:
1. PHP (Никаких фреймворков!)
2. JS (можно использовать jQuery)
3. AJAX
4. По желанию для оформления можно использовать bootstrap
5. Не использовать БД.
Принцип работы: 
1. Загружаем файл (*.csv) со списком фраз  либо текстовое поля для ввода фраз (поддержка до 10000 фраз). 
2. Устанавливаются настройки - полное совпадение фраз или частичное.
3. При выборе частичного совпадения появляется дополнительное поле, в котором необходимо указать максимальное количество различных слов в сравниваемых фразах (“купить яблочный сок” и “купить апельсиновый сок” - различие в одно слово). В поле разрешен ввод только чисел.
4. Устанавливается вид результата: Вывести список фраз без дубликатов, вывести только совпадающие фразы (два столбика).
5. Тип вывода - на экран или в файл (в первом случае при количестве результатов более 20 - вывод постраничный)
6. После обработки входного файл - он удаляется с сервера. 
