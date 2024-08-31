What are Laravel Queues?

Queues are used to perform tasks that take a long time to execute, such as
 * uploading videos  
 * sending emails

 Tasks that use application resources can be postponed, which improves response and loading times, which are essential to the success of any website. They also affect search engine optimization and user experience.

Laravel provides us with a set of options to use queues such as 
* database
* redis
* sqs
* beanstalkd 
,which are already defined in the file. 