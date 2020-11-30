# 01.- Favoriting the question:
### 1. FIND 2 QUESTIONS ASSING 2 VARIABLES

    >> $q1 = App\Question::find(1);
    => App\Question {#2955
         id: 1,
         title: "Explicabo aut voluptatem libero voluptas",
         slug: "explicabo-aut-voluptatem-libero-voluptas",
         body: """
           Consequatur perspiciatis eum autem omnis. Sit eligendi ut dicta cupiditate consequatur quo. Sunt vero non ut ab magni dolores. Fuga voluptas delectus praesentium dolorum animi mollitia et.\n
           \n
           Fugit quidem eligendi dolores deserunt consectetur dolorem cumque. Sit est eligendi corporis quasi pariatur. Qui eveniet ut commodi sed rem.\n
           \n
           Optio cum deleniti dolorem delectus. Aut aliquid necessitatibus quae.\n
           \n
           Laudantium officiis velit voluptate beatae. Consectetur quia voluptatum est. Voluptatem reiciendis consequatur ut saepe.
           """,
         views: 10,
         answers_count: 1,
         votes: -1,
         best_answer_id: null,
         user_id: 1,
         created_at: "2019-04-15 12:04:09",
         updated_at: "2019-04-15 12:04:09",
       }


    >>> $q2 = App\Question::find(2);
    => App\Question {#2941
         id: 2,
         title: "Repellat harum necessitatibus id",
         slug: "repellat-harum-necessitatibus-id",
         body: """
           Consectetur eaque qui tempora. Error quia nemo consequuntur unde omnis tenetur. Odio nemo incidunt aut quas. Porro vel consequatur aut est non.\n
           \n
           Quo cumque fugiat itaque aspernatur quibusdam officia. Vitae quas sit ab ut repudiandae. Dolorum suscipit iste architecto possimus doloribus.\n
           \n
           Tempore architecto atque assumenda eum et quo et non. Dolorem enim ut quo id esse laboriosam totam voluptatem. Et earum ipsum reprehenderit eaque qui. Fugit officiis quis harum eos voluptas.\n
           \n
           Laudantium iste et recusandae odio a. Amet qui fuga incidunt quis sed sed veritatis.\n
           \n
           Reprehenderit molestias reprehenderit a voluptas ipsam fugit dolorum. Dolorum ea asperiores qui saepe quo id quia modi. Sunt voluptatem molestiae porro.\n
           \n
           Dolores labore unde reprehenderit atque. Rerum illo omnis sapiente minima ullam magnam. Libero ea voluptatem delectus doloremque voluptatem nihil aperiam quas.
           """,
         views: 4,
         answers_count: 1,
         votes: 2,
         best_answer_id: null,
         user_id: 2,
         created_at: "2019-04-15 12:04:09",
         updated_at: "2019-04-15 12:04:09",
       }



### 2. FIND 3 USERS AND ASSING 3 VARIABLES

    >>> $u3 = App\User::find(3);
    => App\User {#2943
         id: 3,
         name: "Tremayne Osinski DDS",
         email: "georgette57@example.net",
         email_verified_at: null,
         created_at: "2019-04-15 12:04:09",
         updated_at: "2019-04-15 12:04:09",
       }
    >>> $u2 = App\User::find(2);
    => App\User {#2958
         id: 2,
         name: "Elvis Breitenberg",
         email: "joseph.powlowski@example.net",
         email_verified_at: null,
         created_at: "2019-04-15 12:04:09",
         updated_at: "2019-04-15 12:04:09",
       }
    >>> $u1 = App\User::find(1);
    => App\User {#2959
         id: 1,
         name: "Zane Spencer",
         email: "rschmeler@example.org",
         email_verified_at: null,
         created_at: "2019-04-15 12:04:09",
         updated_at: "2019-04-15 12:04:09",
       }



### 3. LET'S SAY USER 1 FAVORITED QUESTION 1

    >>> $u1->favorites()->attach($q1->id)
    => null



### 3.1 REFRESH THE RELATIONSHIP


    >> $u1->load('favorites')
    => App\User {#2959
         id: 1,
         name: "Zane Spencer",
         email: "rschmeler@example.org",
         email_verified_at: null,
         created_at: "2019-04-15 12:04:09",
         updated_at: "2019-04-15 12:04:09",
         favorites: Illuminate\Database\Eloquent\Collection {#2973
           all: [
             App\Question {#2969
               id: 1,
               title: "Explicabo aut voluptatem libero voluptas",
               slug: "explicabo-aut-voluptatem-libero-voluptas",
               body: """
                 Consequatur perspiciatis eum autem omnis. Sit eligendi ut dicta cupiditate consequatur quo. Sunt vero non ut ab magni dolores. Fuga voluptas delectus praesentium dolorum animi mollitia et.\n
                 \n
                 Fugit quidem eligendi dolores deserunt consectetur dolorem cumque. Sit est eligendi corporis quasi pariatur. Qui eveniet ut commodi sed rem.\n
                 \n
                 Optio cum deleniti dolorem delectus. Aut aliquid necessitatibus quae.\n
                 \n
                 Laudantium officiis velit voluptate beatae. Consectetur quia voluptatum est. Voluptatem reiciendis consequatur ut saepe.
                 """,
               views: 10,
               answers_count: 1,
               votes: -1,
               best_answer_id: null,
               user_id: 1,
               created_at: "2019-04-15 12:04:09",
               updated_at: "2019-04-15 12:04:09",
               pivot: Illuminate\Database\Eloquent\Relations\Pivot {#2954
                 user_id: 1,
                 question_id: 1,
               },
             },
           ],
         },
       }



### YOU'LL SEE NOW USER 1 HAS 1 FAVORITE QUESTION

    >>> $u1->favorites
    => Illuminate\Database\Eloquent\Collection {#2973
         all: [
           App\Question {#2969
             id: 1,
             title: "Explicabo aut voluptatem libero voluptas",
             slug: "explicabo-aut-voluptatem-libero-voluptas",
             body: """
               Consequatur perspiciatis eum autem omnis. Sit eligendi ut dicta cupiditate consequatur quo. Sunt vero non ut ab magni dolores. Fuga voluptas delectus praesentium dolorum animi mollitia et.\n
               \n
               Fugit quidem eligendi dolores deserunt consectetur dolorem cumque. Sit est eligendi corporis quasi pariatur. Qui eveniet ut commodi sed rem.\n
               \n
               Optio cum deleniti dolorem delectus. Aut aliquid necessitatibus quae.\n
               \n
               Laudantium officiis velit voluptate beatae. Consectetur quia voluptatum est. Voluptatem reiciendis consequatur ut saepe.
               """,
             views: 10,
             answers_count: 1,
             votes: -1,
             best_answer_id: null,
             user_id: 1,
             created_at: "2019-04-15 12:04:09",
             updated_at: "2019-04-15 12:04:09",
             pivot: Illuminate\Database\Eloquent\Relations\Pivot {#2954
               user_id: 1,
               question_id: 1,
             },
           },
         ],
       }



### 3.2.LET SAY USER 1 HAS THE 2ND QUESTION AS FAVORITE


    >>> $u1->favorites()->attach($q2)
    => null
    >>> $u1->favorites
    => Illuminate\Database\Eloquent\Collection {#2973
         all: [
           App\Question {#2969
             id: 1,
             title: "Explicabo aut voluptatem libero voluptas",
             slug: "explicabo-aut-voluptatem-libero-voluptas",
             body: """
               Consequatur perspiciatis eum autem omnis. Sit eligendi ut dicta cupiditate consequatur quo. Sunt vero non ut ab magni dolores. Fuga voluptas delectus praesentium dolorum animi mollitia et.\n
               \n
               Fugit quidem eligendi dolores deserunt consectetur dolorem cumque. Sit est eligendi corporis quasi pariatur. Qui eveniet ut commodi sed rem.\n
               \n
               Optio cum deleniti dolorem delectus. Aut aliquid necessitatibus quae.\n
               \n
               Laudantium officiis velit voluptate beatae. Consectetur quia voluptatum est. Voluptatem reiciendis consequatur ut saepe.
               """,
             views: 10,
             answers_count: 1,
             votes: -1,
             best_answer_id: null,
             user_id: 1,
             created_at: "2019-04-15 12:04:09",
             updated_at: "2019-04-15 12:04:09",
             pivot: Illuminate\Database\Eloquent\Relations\Pivot {#2954
               user_id: 1,
               question_id: 1,
             },
           },
         ],
       }



### NOW YOU'LL SEE 2 FAVORITE QUESTION BY USER 1

    >>> $u1->load('favorites')
    => App\User {#2959
         id: 1,
         name: "Zane Spencer",
         email: "rschmeler@example.org",
         email_verified_at: null,
         created_at: "2019-04-15 12:04:09",
         updated_at: "2019-04-15 12:04:09",
         favorites: Illuminate\Database\Eloquent\Collection {#2985
           all: [
             App\Question {#2981
               id: 1,
               title: "Explicabo aut voluptatem libero voluptas",
               slug: "explicabo-aut-voluptatem-libero-voluptas",
               body: """
                 Consequatur perspiciatis eum autem omnis. Sit eligendi ut dicta cupiditate consequatur quo. Sunt vero non ut ab magni dolores. Fuga voluptas delectus praesentium dolorum animi mollitia et.\n
                 \n
                 Fugit quidem eligendi dolores deserunt consectetur dolorem cumque. Sit est eligendi corporis quasi pariatur. Qui eveniet ut commodi sed rem.\n
                 \n
                 Optio cum deleniti dolorem delectus. Aut aliquid necessitatibus quae.\n
                 \n
                 Laudantium officiis velit voluptate beatae. Consectetur quia voluptatum est. Voluptatem reiciendis consequatur ut saepe.
                 """,
               views: 10,
               answers_count: 1,
               votes: -1,
               best_answer_id: null,
               user_id: 1,
               created_at: "2019-04-15 12:04:09",
               updated_at: "2019-04-15 12:04:09",
               pivot: Illuminate\Database\Eloquent\Relations\Pivot {#2975
                 user_id: 1,
                 question_id: 1,
               },
             },
             App\Question {#2982
               id: 2,
               title: "Repellat harum necessitatibus id",
               slug: "repellat-harum-necessitatibus-id",
               body: """
                 Consectetur eaque qui tempora. Error quia nemo consequuntur unde omnis tenetur. Odio nemo incidunt aut quas. Porro vel consequatur aut est non.\n
                 \n
                 Quo cumque fugiat itaque aspernatur quibusdam officia. Vitae quas sit ab ut repudiandae. Dolorum suscipit iste architecto possimus doloribus.\n
                 \n
                 Tempore architecto atque assumenda eum et quo et non. Dolorem enim ut quo id esse laboriosam totam voluptatem. Et earum ipsum reprehenderit eaque qui. Fugit officiis quis harum eos voluptas.\n
                 \n
                 Laudantium iste et recusandae odio a. Amet qui fuga incidunt quis sed sed veritatis.\n
                 \n
                 Reprehenderit molestias reprehenderit a voluptas ipsam fugit dolorum. Dolorum ea asperiores qui saepe quo id quia modi. Sunt voluptatem molestiae porro.\n
                 \n
                 Dolores labore unde reprehenderit atque. Rerum illo omnis sapiente minima ullam magnam. Libero ea voluptatem delectus doloremque voluptatem nihil aperiam quas.
                 """,
               views: 4,
               answers_count: 1,
               votes: 2,
               best_answer_id: null,
               user_id: 2,
               created_at: "2019-04-15 12:04:09",
               updated_at: "2019-04-15 12:04:09",
               pivot: Illuminate\Database\Eloquent\Relations\Pivot {#2984
                 user_id: 1,
                 question_id: 2,
               },
             },
           ],
         },
       }
    >>>



### 4.NOW LETS SAY USER 2 HAD FAVORITED QUESTION 1 AND 2
    >>>  $u2->favorites()->attach([$q1->id, $q2->id])
    => null




### 4.1 WE CAN ALSO LINK BETWEEN USER AND QUESTION MODEL, THOUGH THE RELATIONSHIP

	LET'S SAY USER3 HAS FAVORITED QUESTION 1
	>> 4.1.1 $q1->favorites()->attach($u3);
	=> null


	>>> 4.1.2 $u3->favorites
	=> Illuminate\Database\Eloquent\Collection {#2977
     all: [
       App\Question {#2961
         id: 1,
         title: "Et temporibus dolorum nesciunt",
         slug: "et-temporibus-dolorum-nesciunt",
         body: """
           Aut aut dolores labore labore odio qui expedita. Quia dolor autem rem sed aut blanditiis blanditiis. Omnis omnis ut nihil quia adipisci perferendis. Ut neque dicta consequuntur quia omnis unde qui. Libero facilis voluptatem asperiores sit consequatur velit voluptatibus.\n
           \n
           Sequi tempore quia quia nisi illum et et. Sed quisquam nihil perspiciatis qui quibusdam. Dolorum quisquam qui assumenda eum. Explicabo quasi ducimus odit aliquid consequatur nihil.\n
           \n
           Autem corrupti qui deserunt fugit. Et sed ex eaque. Fugiat omnis earum amet minima officiis occaecati.
           """,
         views: 8,
         answers_count: 3,
         votes: 5,
         best_answer_id: null,
         user_id: 1,
         created_at: "2019-04-15 15:17:09",
         updated_at: "2019-04-15 15:17:10",
         pivot: Illuminate\Database\Eloquent\Relations\Pivot {#2980
           user_id: 3,
           question_id: 1,
         },
       },
     ],
   }




### x. IF WE RUN THIS CODE AGAIN, WILL GET AN ERROR, BECAUSE IN THE MIGRATION FILE WE PREVENT THAT BY DEFINE INDEX AS UNIQUE

	>> 4.1.1 $q1->favorites()->attach($u3);

	Illuminate/Database/QueryException with message 'SQLSTATE[23000]: Integrity constraint violation: 1062 Duplicate entry '3-1' for key 'favorites_user_id_question_id_unique' (SQL: insert into `favorites` (`question_id`, `user_id`) values (1, 3))'
	>>>




### 5. NOW LET'S SAY USER 1 HAS UNFAVORITED QUESTION 2

	>>> 5.1 $u1->favorites()->detach($q1);
	=> 1
	>>> 5.2 $u1->favorites
	=> Illuminate\Database\Eloquent\Collection {#2969
	     all: [
	       App\Question {#2968
	         id: 1,
	         title: "Et temporibus dolorum nesciunt",
	         slug: "et-temporibus-dolorum-nesciunt",
	         body: """
	           Aut aut dolores labore labore odio qui expedita. Quia dolor autem rem sed aut blanditiis blanditiis. Omnis omnis ut nihil quia adipisci perferendis. Ut neque dicta consequuntur quia omnis unde qui. Libero facilis voluptatem asperiores sit consequatur velit voluptatibus.\n
	           \n
	           Sequi tempore quia quia nisi illum et et. Sed quisquam nihil perspiciatis qui quibusdam. Dolorum quisquam qui assumenda eum. Explicabo quasi ducimus odit aliquid consequatur nihil.\n
	           \n
	           Autem corrupti qui deserunt fugit. Et sed ex eaque. Fugiat omnis earum amet minima officiis occaecati.
	           """,
	         views: 8,
	         answers_count: 3,
	         votes: 5,
	         best_answer_id: null,
	         user_id: 1,
	         created_at: "2019-04-15 15:17:09",
	         updated_at: "2019-04-15 15:17:10",
	         pivot: Illuminate\Database\Eloquent\Relations\Pivot {#2966
	           user_id: 1,
	           question_id: 1,
	         },
	       },
	     ],
	   }

### 6. NOW LET'S UNFAVORITE QUESTION 1 AND 2 FROM USER 2

	>>> 6.1 $u2->favorites()->detach([$q1->id, $q2->id]);
	=> 2
	>>> 6.2 $u2->load('favorites')->favorites
	=> Illuminate\Database\Eloquent\Collection {#2999
	     all: [],
	   }
	>>>





### 7 [ LASTLY WE CAN CHECK IF A PARTICULAR QUESTION FAVORITED BY A PARTICULAR USER BY SAYING


	7.1 IS USER 3 FAVORITED QUESTION 2 ? -- FALSE
	>>> $q2->favorites()->where('user_id', $u3->id)->count() > 0
	=> false

	7.2 IS USER 3 FAVORITED QUESTION 1 ? -- TRUE
	>>> $q1->favorites()->where('user_id', $u3->id)->count() > 0
	=> true