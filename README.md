# Official Website Degovan

<br/>
<br/>

# Api Spec
### Documentation of API Usage

## Login
Get the access token for store, update, and delete data
#### Request
* Method : ``POST``
* Endpoint : ``api/login``

#### Params
* Email : ``string``
* Password : ``string``

#### Response
```json
{
  "status": "string",
  "message" : "string",
  "data": [
    {
      "token": "string",
      "token_type": "string"
    }
  ]
}
```

## Get Member
Show all the members data
#### Request
* Method : ``GET``
* Endpoint : ``/api/member``
 
#### Response
```json
{
  "status": "string",
  "members": [
    {
      "id": "number",
      "name": "string",
      "part": "string",
      "image": "string",
      "description": "string"
    }
  ]
}
```
 
## Show Member
Show member data according to the _id_
#### Request
* Method : ``GET``
* Endpoint : ``/api/member/{id}``
 
#### Response
```json
{
  "status": "string",
  "member": {
    "id": "number",
    "name": "string",
    "part": "string",
    "image": "string",
    "description": "string"
  }
}
```

## Create Member
Store the member data
#### Request
* Method : ``POST``
* Endpoint : ``/api/member``

#### Params
* name : ``string``
* part : ``string``
* image : ``file(image:jpg,jpeg,png,gif,webp)``
* description : ``string``

#### Response
```json
{
  "status": "string",
  "message": "string"
}
```

## Edit Member
Update the member data
#### Request
* Method : ``PUT`` | ``PATCH``
* Endpoint : ``/api/member/{id}``

#### Params
* name : ``string``
* part : ``string``
* image : ``file(image:jpg,jpeg,png,gif,webp)`` -optional
* description : ``string``

#### Response
```json
{
  "status": "string",
  "message": "string"
}
```

## Delete Member
Destroy the member data
#### Request
* Method : ``DELETE``
* Endpoint : ``/api/member/{id}``

#### Response
```json
{
  "status": "string",
  "message": "string"
}
```
<br/>
---

## Get Portfolio
Show all the portfolios data
#### Request
* Method : ``GET``
* Endpoint : ``/api/portofolio``
 
#### Response
```json
{
  "status": "ok",
  "portofolios": [
    {
      "id": "number",
      "title": "string",
      "images_url": "string",
      "category_id": "number",
      "service_id": "number",
      "slug": "string",
      "description": "string"
    }
  ]
}
```
 
## Show Portfolio
Show portfolio data according to the _id_
#### Request
* Method : ``GET``
* Endpoint : ``/api/portofolio/{id}``
 
#### Response
```json
{
  "status": "string",
  "portofolio": {
    "id": "number",
    "title": "string",
    "images_url": "string",
    "category_id": "number",
    "service_id": "number",
    "slug": "string",
    "description": "string"
  }
}
```

## Create Portfolio
Store the portfolio data
#### Request
* Method : ``POST``
* Endpoint : ``/api/portofolio``

#### Params
* title : ``string``
* images_url : ``file(image:jpg,jpeg,png,gif,webp)``
* category_id : ``number``
* service_id : ``number``
* slug : ``string``
* description : ``string``

#### Response
```json
{
  "status": "string",
  "message": "string"
}
```

## Edit Portfolio
Update the portfolio data
#### Request
* Method : ``PUT`` | ``PATCH``
* Endpoint : ``/api/portofolio/{id}``

#### Params
* title : ``string``
* images_url : ``file(image:jpg,jpeg,png,gif,webp)`` -optional
* category_id : ``number``
* service_id : ``number``
* slug : ``string``
* description : ``string``

#### Response
```json
{
  "status": "string",
  "message": "string"
}
```

## Delete Portfolio
Destroy the portfolio data
#### Request
* Method : ``DELETE``
* Endpoint : ``/api/portofolio/{id}``

#### Response
```json
{
  "status": "string",
  "message": "string"
}
```
