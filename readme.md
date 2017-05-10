## Given tasks:

- System for items organization
- Each item must have:
    - `Title`
    - `Count`
    - `Price`
    - `Category`
    - `Description is optional`
    
- Functions to implement:
- `Items creation`
- `Items review`
- `Categories creation`
- `Categories review`
- `Items which belongs to specific category review`
- System must have one public endpoint which returns items information as JSON
    - `/api/items/{id}`
    
## What was done:

- Categories
    - `Create functionality`
    - `Update functionality`
    - `Delete functionality`
    - `Items which belongs to category review`
- Items
    - `Create functionality`
    - `Update functionality`
    - `Delete functionality`
    - `Public endpoint for item information as JSON`
    
## How to use?

- First step is to create new category. If there are no categories you wont be able to create new items. 
    - To do so press 'Categories' in navigation bar or 'View categories' button in home page.
    - To create new category press 'New category' button. A pop up will appear.
    - Enter category title and press 'Save'.
    - There you go. You now have your first category.
    - If you want to edit it. Press 'Edit category' button near your desired category.
    - If you want to delete it. Press 'Delete category' button near your desired category.
    - To view items in specific category press 'Show items in category'. You will be redirected
    to another window. There you'll see items information.
- When you have created your categories press 'Items' in navigation bar or 'View items' button
in home page.
    - To create new item press 'New item' button. A pop up will appear.
    - Enter item title, count, price and select it's category. If you want you can add item's description.
    - Press enter and you will create your desired item.
    - If you want to edit it. Press 'Edit item' button near desired item.
    - If you want to delete it. Press 'Delete item' button near your desired item.

## Attention

If you want just to test a system I strongly recommend you to use seeds which will populate your database.

    
    