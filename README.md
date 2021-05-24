# Official Website Degovan

<br/>
<br/>

# Api Spec
### Documentation of API Usage
 
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
