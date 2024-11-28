# Company and employee crud with api DEMO

## web side 

Follow these steps to set up a development environment:

1. **Clone the repository**

    ```bash
    git clone https://github.com/JaiveerChavda/company-emp-crud.git
    ```

2. **Install dependencies**

    ```bash
    cd /company-emp-crud
    composer install
    ```

3. **Duplicate the .env.example file and rename it to .env**

    ```bash
    cp .env.example .env
    ```

4. **Generate the application key**

    ```bash
    php artisan key:generate
    ```

5. **Run migration and seed**

    ```bash
    php artisan migrate --seed
    ```

6. **Run the application**

    ```bash
    php artisan serve
    ```


## api side

### login

uri : http://127.0.0.1:8000/api/login , method : POST

add this request structure in form-data

`
email:test@example.com
password:password
`

#### Response

```js
{
    "message": "Authentication was successfull",
    "token": "3|ReZ8ewtvsPkfUtNkgf9g83LShF3APOw9iguFjOs4e3addd08"
}
```

### logout

simply hit this uri to logout (invalidate token)

#### Response

uri : http://127.0.0.1:8000/api/logout , method : POST

```js
{
    "message": "logged out successfully"
}
```

### company create

uri : http://127.0.0.1:8000/api/company , method : POST

add this request structure in form-data

`
name:orange
email:orange@example.com
country:Burkina Faso
city:Kozeytown
address:993 Nestor Track↵East Jamar, WY 29855
`

#### Response 

```js
{
    "name": "orange",
    "email": "orange@example.com",
    "country": "Burkina Faso",
    "city": "Kozeytown",
    "address": "993 Nestor Track\nEast Jamar, WY 29855",
    "updated_at": "2024-11-28T08:08:29.000000Z",
    "created_at": "2024-11-28T08:08:29.000000Z",
    "id": 7
}
```