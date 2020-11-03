# Laravel Package untuk bekerja dengan Google Ads API

## Installing

1. Tambah Repositories ke `composer.json`

```
"repositories": [
  {
    "type": "vcs",
    "url": "https://github.com/aggunawan/google-ads.git"
  }
]
```

2. Install package

````
$ composer require aggunawan/google-ads
````

3. Tambahkan credentials ke file `config/services.php`

```
'googleads' => [
  'client_id' => env('GOOGLEADS_CLIENT_ID'),
  'client_secret' => env('GOOGLEADS_CLIENT_SECRET'),
  'refresh_token' => env('GOOGLEADS_REFRESH_TOKEN'),
  'developer_token' => env('GOOGLEADS_DEVELOPER_TOKEN'),
  'manager_id' => env('GOOGLEADS_MANAGER_ID'),
]
```

## Usage
Lihat wiki untuk penggunaan package

## Note
Tulis Google Ads Api Credentials di file `.env`
