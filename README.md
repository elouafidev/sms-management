<p align="center">
    <img src="https://www.whatcounts.com/wp-content/uploads/2018/06/SMS-Marketing-FAQs.jpg" alt="SMS Management"/>
</p>

# SMS Management  & SMS API 

SMS Management is free and open source SMS Management software with Gammu as core service.

## Getting Started

You can follow [Installation](#installing) instruction

### Prerequisites

I'll assume you has web development enviroment like laradock, or xampp on your computer

- Install [Composer](https://getcomposer.org/download/)
```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === 'a5c698ffe4b8e849a443b120cd5ba38043260d5c4023dbf93e1558871f1f07f58274fc6f4c93bcfd858c6bd0775cd8d1') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```
- Install [Gammu](https://wammu.eu/download/gammu/)

For Ubuntu :
```
sudo add-apt-repository ppa:nijel/ppa
sudo apt-get update
sudo apt-get install gammu-smsd gammu python-gammu usb-modeswitch -y
```
Another OS : [here](https://wammu.eu/download/gammu/)

### Installing


```
$ cd ~ && git clone https://github.com/elouafidev/sms-management.git

$ cd sms-management

$ composer update

$ cp .env.example .env

$ sudo chown -R $USER:www-data storage && sudo chown -R $USER:www-data bootstrap/cache

$ sudo chmod -R 775 storage && chmod -R 775 bootstrap/cache

$ echo "* *     * * *   $USER    cd /home/$USER/sms-management && /usr/bin/php artisan schedule:run >> /dev/null 2>&1" | sudo tee -a /etc/crontab

$ php artisan key:generate

$ php artisan migrate

$ php artisan db:seed --class="adminSeeder"
```

## Deployment

Add additional notes about how to deploy this on a live system

### API Document 
```
url local : http://example.com:8000/api/latest

parameters :
- access_key  : token for authentication
- request : request you want send to  (send - check_status )
- phone : The phone number to which you want to send SMS
- content : SMS content

Response (json):
- success (boolean): true or false
- data : Get the result of the request if success is true
- error : : Get the error of the request if success is false

example :
{ 
    Success  : // true OR false
    Data : "send" // result for request
    error : {
        'code' :  // code error {202 ,404,…}
        'type' : //‘ missing_access_key’,’ missing_access_key’,’ bad_request’,…
        'info' : // Error information
    },
}

```

## Built With

* [Laravel](https://github.com/laravel/laravel) - Laravel is a web application framework with expressive, elegant syntax.
* [Gammu-SMSD](https://wammu.eu/) - is a service to mass send and receive SMS messages

## Contributing 

## Authors

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details

## Acknowledgments

* [Cara Membuat SMS Gateway Dengan Gammu + USB Modem + MySQL Database](https://medium.com/@juniyadi/cara-membuat-sms-gateway-dengan-gammu-usb-modem-mysql-database-1faae8f7d6a7)
* [How to setup a USB 3G Modem on Raspberry PI using usb_modeswitch and wvdial](https://www.thefanclub.co.za/how-to/how-setup-usb-3g-modem-raspberry-pi-using-usbmodeswitch-and-wvdial)
