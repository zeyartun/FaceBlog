# FaceBlog

```
git clone https://github.com/zeyartun/FaceBlog.git
cd FaceBlog
composer update
cp .env.example .env
change Database Name...***
php artisan migrate:fresh --seed
php artisan serve

```
# login as Admin
### To Admin => localhost:8000/adminHome 
### (You must have role and You must confirm with email)

### useremail => zeyar0@gmail.com
### password => password



# You Can Do It.
### Email Confirm if you login to admin dashboard(localhost:8000/adminHome)
### Password Forget Email
### Password reset Email

### Can Edit User profile image
### Can See posts By Category
### Can Edit post and add post image
### Can Hide and Delete post
### Can Send message
### Can Comment in posts But you must be login

## By Admin 
```
      => can see all members and edit roles
      => can edit category (but can't delete if category have posts)
      => can edit all posts (content and category) add to many categories
      => can see messages and comment (hide,restore,delete)
```
## By Manger 
```
      => can see all members can't edit roles ***
      => can edit category (but can't delete if category have posts)
      => can edit all posts (content and category) add to many categories
      => can see messages and comment (hide,restore,delete)
```
## author 
```
      => can see all post but edit his posts
      => can edit his posts only (content and category)
```
## other 
```
      => can comment 

```
### To Do
```
      English to myanmar
      API
```
