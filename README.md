# This is the refactor test for Christian Arevalo

This repository is intended to cover the requirements contained in the Laravel Refactor file for Swim Communications - DA. The purpose of this code should be exclusively for assesment only and should not be used for commercial purposes.

## Analisys of requirements

The first step on the test I made was read and analize the conditions stated in the document Laravel Refactor and then I moved to do the same in the given code.

## Design of DB and object conditions

After reviewing the code the next big step I took was design a data structure from reverse engineering the existing code.

This is the proposed diagram that the refactored code will follow from now on:

## Test Diagram

![Test Diagram](https://github.com/carevaloq87/christian-swim-refactor/blob/master/db/diagram.png "Test Diagram")

## Creation of routes for the given scenario

In this step I defined all the routes that the app should accept. Most of them remained the same including its parameters with the exception of the Delete route which was modified in order to identify all the variables it can handle and avoiding a potential error using same variable names on URLs.

Also, all routes were grouped under the same prefix that seems to identfy the version of the app '/v1'.

## Define and create the User Model

The idea of this model is to represent a User and it's contiditions, there are a list of relevant factors that were included in order to improve the existing code:

The attribute `display_name` was added to the model in order to get the most of Laravel's accessors (the method used is `getDisplayNameAttribute` ) which retrieves the attribute on the given routes as is added on toJson() or toArray() methods or through a regular return of a controller in Laravel ie. `return $variable`.

The same logic applied to the attributes `login_date_formated`, `created_at_formated`, `updated_at_formated` but it also format dates as required `Y-m-d H:i:s`.

Next, I'm indicating the relation of the Model User with the Model Pet, as in the given diagram One User has many Pet, this method allow us to get all the Pets that belongs to a given User, this `belongsTo` relationship will be added to Pets as well.

Finally, the field `password` is hidden from any User invocation.

## Define and create the Pet Model

The idea of this model is to represent a pet and it's contiditions, there are a list of relevant factors that were included in order to improve the existing code:

The attribute `favourite_foods` was added to the model in order to get the most of Laravel's accessors (the method used is `getFavouriteFoodsAttribute` ) which retrieves the attribute on the given routes as is added on toJson() or toArray() methods or through a regular return of a controller in Laravel ie. `return $variable`.

Next, I'm indicating the relation of the Model Pet with the Model User, as in the given diagram one Pet belongs to a User.

Finally,  I'm indicating the relation of the Model Pet with the Model PetFood.

## Define and create the Pet Foods Model

The idea of this model is to represent pet foods and it's contiditions, no relationship back to the model Pet was added as from the given scenario is not necessary.

## Create the interface with for the given routes in the web file

The created interface is called `UsersController` and includes the following methods:

`index` display all the Users at the same time as there were no paginator in the given code, including the `display_name` that was added through a Laravel's accessors, as well as hidding the `pass - This could be an improvement.
`show` display all the information related to a User, the method `findOrFail` is not used as it will return an error 404 and the initial code suggest a null.
`pets` display all the Pets fot a given User including it's favorite foods
`store` creates a given User with the required fields and validates its content with the `getData` method, removing unnecessary parameters or controlling business rules.
`destroy` deletes a given pet from a given user.

## MISC

The version of Laravel used was 5.8, it was deployed using WAMP for windows, seeders for users were implemented and used, the tests were made in Postman.

If the tester wants to test the scenario without verifying CSRF an `except` rule shoud be added in variable `protected $except` located in the file `\app\Http\Middleware\VerifyCsrfToken.php`, the rule should be `'v1/users/*'`, this is not intended to be used in production as is considered as a bad practice instead you can use the method `@csrf` in blade or the method `csrf_token()` to generate a CSRF-Token.