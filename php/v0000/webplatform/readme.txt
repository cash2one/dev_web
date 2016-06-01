��

   FrameWork -- C
   App       -- A
   Package   -- P

   Object    -- O
   Data      -- D
   View      -- V
   Html      -- H ��̬ web ҳ
   Resource  -- F ��Դ gif wav png jpeg
                  files
   Images    -- I 
   Medias

   Router    -- R ·��
   Module    -- M
   Exception -- E
   Controller -- L [logic]


   A   --  app
   B 
   C   --  framework core 
   D   --  data
   E   --  exception
   F   --  files wav resources ....
   G
   H   --  html
   I   --  images  gif bmp jpeg png
   J
   K
   L   --  controller
   M   --  module
   N   --  inc include
   O   --  objects
   P   --  package ���ܰ�
   Q
   R   --  router ·��
   S
   T
   U
   V   --  view
   W
   X
   Y
   Z
  


   Root 
    |-- C [framework] 
    |   |-- E [exception]
    |   |-- D [database datadriver]
    |   |-- route.php
    |   |-- baseapp.php
    |   |-- basemodule.php
    |   |-- cookie.php
    |   |-- request.php
    |   |-- response.php
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
    |   |    |-- M [modules]
    |   |    |   |-- mBlog
    |   |    |        |-- controller
    |   |    |        |-- objects
    |   |    |        |-- views
    |   |    |-- L [controller]
    |   |    |-- O [objects over modules]
    |   |    |-- V [views over modules]
    |   |    |-- assets
    |   |         |-- css
    |   |-- EShop          
    |        |-- mCommodity (��Ʒ)
    |        |-- mOrder   (����)
    |        |-- mProduct (��Ʒ)
    |             |-- O
    |             |-- V
    |   
    |-- V [views]
    |-- assets
         |-- css


        
