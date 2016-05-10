¼ò»¯

   FrameWork -- C
   App       -- A
   Package   -- P

   Object    -- O
   Data      -- D
   View      -- V
   Module    -- M
   Exception -- E
   Controller -- L [logic]


   Root 
    |-- C [framework] 
    |   |-- E [exception]
    |   |-- D [database datadriver]
    |   |-- route.php
    |   |-- baseapp.php
    |   |-- basemodule.php
    |   |-- cookie.php
    |   
    |-- P [packages]
    |   |-- App
    |   |    |-- M [modules]
    |   |        |-- mApp.php
    |   |        |-- mApp
    |   |        |    |-- controller
    |   |        |     
    |   |        |-- mUser
    |   |             |-- L [controller]
    |   |             |-- O [objects]
    |   |             |-- V [views]
    |   |-- Business
    |   |    |-- M [modules]
    |   |        |-- mBlog
    |   |             |-- controller
    |   |             |-- objects
    |   |             |-- views
    |-- A [apps]
    |   |-- Blog
    |        |-- M [modules]
    |            |-- mBlog
    |                 |-- controller
    |                 |-- objects
    |                 |-- views
    |   
    |-- V [views]
    |-- assets
         |-- css


        
