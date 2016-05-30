简化

   FrameWork -- C
   App       -- A
   Package   -- P

   Object    -- O
   Data      -- D
   View      -- V
   Html      -- H 静态 web 页
   Resource  -- F 资源 gif wav png jpeg
                  files
   Router    -- R 路由
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
    |   |    |   |-- mApp.php
    |   |    |   |-- mApp
    |   |    |   |    |-- L [controller]
    |   |    |   |     
    |   |    |   |-- mUser
    |   |    |        |-- L [controller]
    |   |    |        |-- O [objects]
    |   |    |        |-- V [views]
    |   |    |         
    |   |    |-- L [controller]
    |   |    |-- O [objects over modules]
    |   |    |-- V [views over modules]
    |   |    |-- assets
    |   |         |-- css
    |   |     
    |   |-- Business
    |   |    |-- M [modules]
    |   |        |-- mBlog
    |   |             |-- controller
    |   |             |-- objects
    |   |             |-- views
    |-- A [apps]
    |   |-- Blog
    |        |-- M [modules]
    |        |   |-- mBlog
    |        |        |-- controller
    |        |        |-- objects
    |        |        |-- views
    |        |-- L [controller]
    |        |-- O [objects over modules]
    |        |-- V [views over modules]
    |   |    |-- assets
    |   |         |-- css
    |   
    |-- V [views]
    |-- assets
         |-- css


        
