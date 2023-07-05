## logistic-integration
This service aims to integrate with several logistic providers for pricing validation and also delivery estimation

### Architecture

<img width="877" alt="Screen Shot 2023-07-05 at 09 56 13" src="https://github.com/sjuliper7/logistic-integration-service/assets/29673571/beec9a44-2a36-413a-b899-a391878709be">


### Database Design
<img width="669" alt="Screen Shot 2023-07-05 at 09 56 49" src="https://github.com/sjuliper7/logistic-integration-service/assets/29673571/c1a80441-2c1f-42ee-a017-315b48b18788">


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


##### NOTE
CHANGE DATA SOURCE FROM config/datasource.php if want to change source of the dta
