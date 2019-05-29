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
