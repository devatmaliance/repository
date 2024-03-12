# repository
Repository для испоьзования общего интерфейса для добавления, обновления и удаления записей из Мастера

# Приминение RepositoryService

1) Создаем  

$service = new RepositoryService(
     $this->request->rawBody,
     new RepositoryYii,
     new ActionReceiverDTO,
     new RepositoryEntity,
     new ServiceReceiverMapperDTO
)

2) $this->request->rawBody = json 
 new RepositoryYii - класс, который совершает все необходимые действия для синхроннизации create, update, delete 
 3 самых важных момента для понимания работы с данным классом
 
    - public const SCENARIO = 'master_model_changes';
    - private ActionDTOInterface $actionDTO;
    - private RepositoryEntityInterface $repositoryEntity; 

SCENARIO = 'master_model_changes' - используется для того, чтобы не срабатывало поведение, которое может уже быть привязано к одной из модели, поведение отправляет по апи запрос на добавление, изменение или удалении записи из таблицы, если данный функционал используется через формы или консоль.

private ActionDTOInterface $actionDTO;

это наша ДТО, которая заполняется при получении json файла
также передается в initDTO, вторым параметром ServiceReceiverMapperDTOInterface, который служит для маппинга полей под нашу модель.

Пример: 

$this->actionDTO->initDTO($this->body, $this->mapperDTO);

# Класс Entity
- библотечный класс, в котором перечислены все модели на текущий момент, 
чтобы мы могли использовать их в entity при передаче в json и обработке в микросервисе.
Тут мы перечисляем все ДТО по которым нам необходимо менять поля с мастера таблиц на свои, если не указать, то будут использоваться поля по умолчанию

class ServiceReceiverMapperDTO implements ServiceReceiverMapperDTOInterface
{
    
    public function mapDtos(): array
    {
       return [
            Entity::DEVICE => DeviceDTO::class
        ];
    }

    public function getMapDto(string $entity): array
    {
        $dto = $this->mapDtos()[$entity] ?? [];
        return $dto ? ['fields' => $dto] : [];
    }
}

public function initDTO(\stdClass $source, ?ServiceReceiverMapperDTOInterface $mapperDTO): void
    {
        $dtoMap = isset($source->entity) ? $mapperDTO->getMapDto($source->entity) : [];
        $this->loadSource($source, $dtoMap);

        if (!$this->validate()) {
            throw new ModelNotValidateException($this);
        }
    }


private RepositoryEntityInterface $repositoryEntity - тут мы заполняем массив Entity => Model, с которыми наш микросервис будет работать.
Например: мы только синхронизируем с двумя сущностями и относим их к нащим моделям в сервисе, для выполнения операций уже с ними.

class RepositoryEntity implements RepositoryEntityInterface
{

    public function entities(): array
    {
        return [
            Entity::DEVICE => new Device(),
            Entity::FILTERS => new Filters(),
        ];
    }
}


3) $repositoryService->execute() - и вызываем фунцию, происходит запись в нашу базу и возвращает массив с полями модели.

