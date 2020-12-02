
## Instance of

### 1. define una variable
    >>> $model1 = new App\Question
    => App\Question {#4113}
### 2. define otra variable
    >>> $model2 = new App\Answer
    => App\Answer {#4112}
### 3 chequea si alguna instancia es instancia de un clase en particular, por ejemplo
#### 3.1 preguntando... $model1 es instancia de App\Question? y la respuesta sera afirmativa
    >>> $model1 instanceof App\Question
    => true
#### 3.2 $model2 es instancia de App\Question ? y la respuesta sera negativa.
    >>> $model2 instanceof App\Question
    => false
#### 3.3 pero si preguntamos de la forma correcta, obtendre true.
    >>> $model2 instanceof App\Answer
    => true