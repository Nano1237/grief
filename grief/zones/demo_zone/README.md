The files 'delete', 'get', 'patch' and 'put' are controllers.
Each zone can only have one controlle for each possible request method.

Everything else in this folder (each php file with a class inside) could be (for example) a model.




I recomend to use the prefix '~model_' for all models inside of this folder (that you can find them easyier).
If you like another prefix or no prefix look at the config.ini, here you can change the variable (model_prefix) to whatever you like.
The class inside of the file has to be named exacly like anithing after '~model_'