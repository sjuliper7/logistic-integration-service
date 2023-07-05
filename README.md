## logistic-integration
This service aim to integrate to several logistic provider for pricing validation and also delivery estimation

### Architecture

### Database Design


### How to start?

#### Copy the Env first
```shell
cp .env.example .env
php artisan make:vendor
```

#### Setup Database

Create your database with name `logistic_integration_development`
You can use docker or install it into your computer

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=logistic_integration_development
DB_USERNAME=root
DB_PASSWORD=root
```

#### Add you api KEY
```env
RAJA_ONGKIR_API_KEY=0df6d5bf733214af6c6644eb8717c92c
```

#### Start Functionality
##### Run the artisan for create dummy data
```shell
php artisan fetch:province-city-data
```

#### Note
Start the Service First
```shell
php artisan serve
```

##### Run Endpoint 1
```shell
curl --location 'http://localhost:8000/search/provinces?id=1'
```

##### Run Endpoint 2
```shell
curl --location 'http://localhost:8000/search/citis?province_id=1'
```
