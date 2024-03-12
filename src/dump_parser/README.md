SQL DUMP PARSER - парсер дампа мастер таблиц в микромервис

Как работает?

//Путь вк файлу дампа
1) $sql = '/app/db.dump.sql';

/*
Конфиг данного формата:
    - tables: таблицы, которые мы дампим на мастере (filter, users - ключи)
        - table: название в которое мы хотим переименовать таблицу
        - fields: поля, (ключ - поле мастер таблицы, значение - поле микросервиса таблицы), если оставить [], то будут использованы все поля по умолчанию
        - useAutoIncrement - true оставляем автоинкремент для поля, false удаляем
*/
2) $config = [
    'tables' => [
        'filters' => [
            'table' => 'filter',
            'fields' => [
                'id' => 'id',
                'name' => 'name',
                'filter' => 'filters',
                'source' => 'src',
                'url' => 'uri'
            ],
            'useAutoIncrement' => false
        ],
            'users' => [
                'table' => 'user',
                'fields' => [
                    'id' => 'id',
                    'username' => 'name',
                    'password' => 'pwd',
                    'phone' => 'telephone',
                    'photo' => 'image',
                ],
                'useAutoIncrement' => true
            ]
    ]
];


// Создаем new MysqlDumpParser, передаем нужные значение, 
// Устанавливаем sqlFileHandler для parseСreateStructure, после для parseInsertData, получаем 2 дампа, используем в микросервисах

3)  $parser = new MysqlDumpParser($sql, new MysqlDumpAction(new MysqlDumpCommand, $config));
    $parser->setSqlFileHandler(new SqlFileHandler(\Yii::getAlias('@console/runtime/create_structure.sql')));
    $parser->parseCreateStructure();

    $parser->setSqlFileHandler(new SqlFileHandler(\Yii::getAlias('@console/runtime/insert_data.sql')));
    $parser->parseInsertData();