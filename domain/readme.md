Hey there

Here is the «domain» part of adventistcommons. In other words, the business stuff, in a domain-driven-dev concept. The idea is to have code in «domain» folder and namespace. Here is business code, that must not use anything from the framework. All backend that business requires should be here. It is required as a dependency to the application, described in its own ```composer.json```.

# classes glossary
* ```Entities``` are business objects (stored in db) are defined. Entities should not need anything but there properties to live. Properties can be other entities. A system of metadata allow to describe entities.
* ```Action``` are methods to perform data change, on objects, files, in database, anything. Actions are used by controller.
* ```Repositories``` furnish the way to call for data, for example : "Find me the product with id X and its attached data like attachments and projects". Repositories are used by controller.
* ```Hydrator``` is an internal tool that transform a bunch of data in an array into an entity. Data can come from database, form submit, a csv file, or anything else.
* ```Normalizers``` : before hydration, we can apply changes to data to make it fullfil entities need. For example, transform a date as a string into the \DateTime object. That is normalizer job.
* ```File``` is a convenient way to handle files on the system, and there link between entities and filesystem.
* ```Metadata``` permit to get information about entities, what are the fields for example.
* ```Storer``` is the tool that save data (in database)
* ```Processors``` : while storing, it can do aside actions. For example, store in definitive place the file referenced in an entity.
* ```Validators``` is the tool to validate data, and throw a ViolationException if any error happen.

# Infrastructure
To get it all working, framework has to complies a bit of infrastructure. :
* A container, that is a way to create and hold objects for services. Over all, it allow to manage dependencies between classes, with a lazy load (classes are loaded and object created only if someone call it).
* A system to create database queries and to format results to get nested data, on infinite levels.
* The ```putter``` interfaces must be implemented to be able to save data in database.

# how-to ?

## Create a table / entity
* update the database
* create the entity in ```/domain/src/Entity/```
* define metadata basics in the private method ```__getMetadata(): array```, including validation class
* create validation class, and implements all requirements in it
* create the repository, and add its entry in the container
* add the Repository to the creation of the container’s service `RepositoryLister`
* create putter interface and apply it to the right model element on code-igniter side
* add the Putter to the creation of the container’s service `Putter`

## Create a new field in a table / a new property to a model
* update the database
* add the property, getter and setter to entity. Beware of type casting.
* define metadata if defaults does not fit (defaults are in FieldMetadata)
* create normalizer if needed (for example, if you need to transform a string to a \DateTime)

## Create a normalizer (to transform incoming data), a processor (to handle action when saving a data), a formatter (to transform a field data into database value)
* create the class and implements its logic
* register it in container, including dependencies (constructor arguments) if any is needed
* use it in entity metadata
