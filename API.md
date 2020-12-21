# Logger

***resist\Logger\Logger*** 

## Public methods 

### __construct()

```php
public function __construct(resist\Logger\LoggerService $service)
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| *resist\Logger\LoggerService* | **$service** |  |  |
### alert()

```php
public function alert($message, array $context = [], string $table = ""): void
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
|  | **$message** |  |  |
| `array`  | **$context** | [] |  |
| `string`  | **$table** | "" |  |
### critical()

```php
public function critical($message, array $context = [], string $table = ""): void
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
|  | **$message** |  |  |
| `array`  | **$context** | [] |  |
| `string`  | **$table** | "" |  |
### debug()

```php
public function debug($message, array $context = [], string $table = ""): void
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
|  | **$message** |  |  |
| `array`  | **$context** | [] |  |
| `string`  | **$table** | "" |  |
### emergency()

```php
public function emergency($message, array $context = [], string $table = ""): void
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
|  | **$message** |  |  |
| `array`  | **$context** | [] |  |
| `string`  | **$table** | "" |  |
### error()

```php
public function error($message, array $context = [], string $table = ""): void
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
|  | **$message** |  |  |
| `array`  | **$context** | [] |  |
| `string`  | **$table** | "" |  |
### info()

```php
public function info($message, array $context = [], string $table = ""): void
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
|  | **$message** |  |  |
| `array`  | **$context** | [] |  |
| `string`  | **$table** | "" |  |
### log()

```php
public function log($level, $message, array $context = []): void
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
|  | **$level** |  |  |
|  | **$message** |  |  |
| `array`  | **$context** | [] |  |
### notice()

```php
public function notice($message, array $context = [], string $table = ""): void
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
|  | **$message** |  |  |
| `array`  | **$context** | [] |  |
| `string`  | **$table** | "" |  |
### warning()

```php
public function warning($message, array $context = [], string $table = ""): void
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
|  | **$message** |  |  |
| `array`  | **$context** | [] |  |
| `string`  | **$table** | "" |  |


---

# LoggerService

***resist\Logger\LoggerService*** 

## Public methods 

### __construct()

```php
public function __construct(Base $f3, DB\SQL $db)
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| *Base* | **$f3** |  |  |
| *DB\SQL* | **$db** |  |  |
### create()

```php
public function create(string $level, string $message, array $context = [], string $table = ""): void
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$level** |  |  |
| `string`  | **$message** |  |  |
| `array`  | **$context** | [] |  |
| `string`  | **$table** | "" |  |
### getMapper()

```php
public function getMapper(string $table = ""): resist\Logger\LogMapper
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$table** | "" |  |
### logToFile()

```php
public function logToFile(string $level, string $message, array $context = []): void
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| `string`  | **$level** |  |  |
| `string`  | **$message** |  |  |
| `array`  | **$context** | [] |  |


---

# LogMapper

***resist\Logger\LogMapper*** extends ***DB\SQL\Mapper***

## Public methods 

### __construct()

```php
public function __construct(DB\SQL $db, string $table = "")
```

| Type | Parameter name | Default value | Description |
| --- | --- | --- | --- |
| *DB\SQL* | **$db** |  |  |
| `string`  | **$table** | "" |  |
### eraseLogTable()

```php
public function eraseLogTable(): void
```

### Parent class *(DB\SQL\Mapper)* public methods

+ __call()
+ __get()
+ __isset()
+ __set()
+ __unset()
+ aftererase()
+ afterinsert()
+ aftersave()
+ afterupdate()
+ alias()
+ beforeerase()
+ beforeinsert()
+ beforesave()
+ beforeupdate()
+ cast()
+ changed()
+ clear()
+ copyfrom()
+ copyto()
+ count()
+ dbtype()
+ dry()
+ erase()
+ exists()
+ factory()
+ fields()
+ find()
+ findone()
+ first()
+ get()
+ getiterator()
+ insert()
+ last()
+ load()
+ loaded()
+ next()
+ offsetexists()
+ offsetget()
+ offsetset()
+ offsetunset()
+ onerase()
+ oninsert()
+ onload()
+ onsave()
+ onupdate()
+ paginate()
+ prev()
+ required()
+ reset()
+ save()
+ schema()
+ select()
+ set()
+ skip()
+ stringify()
+ table()
+ update()
+ updateAll()
+ valid()


---

