<?php

$app->match('/index.html','TestEmbauche\Ctrl\HomeCtrl::indexAction')->bind('homepage');
$app->match('/info','TestEmbauche\Ctrl\InfoCtrl::indexAction')->bind('infopage');
$app->match('/realisations','TestEmbauche\Ctrl\WorkCtrl::indexAction')->bind('workpage');
$app->match('/contact','TestEmbauche\Ctrl\ContactCtrl::indexAction')->bind('contactpage');

//BLOG
$app->match('/blog','TestEmbauche\Ctrl\Blog\BlogCtrl::indexAction')->bind('blog');
$app->get("/blog/article/show/{id}", 'TestEmbauche\Ctrl\Blog\ArticleCtrl::showAction')->bind("blog.article.show");
$app->get("/blog/category/{id}", 'TestEmbauche\Ctrl\Blog\CategoryCtrl::showAction')->bind("blog.category.show");

//USER
$app->get("/login", 'TestEmbauche\Ctrl\UserCtrl::loginAction')->bind("login");
$app->get("/logout", 'TestEmbauche\Ctrl\UserCtrl::logoutAction')->bind("logout");

//ADMIN
$app->get("/admin/", 'TestEmbauche\Ctrl\Blog\AdminCtrl::indexAction')->bind("admin.index");
$app->get("/user/add", 'TestEmbauche\Ctrl\UserCtrl::addAction')->bind("user.add")->method('GET|POST');
//ADMIN=>BLOG=>CATEGORY
$app->get("/admin/blog/category/add", 'TestEmbauche\Ctrl\Blog\CategoryCtrl::addAction')->bind("blog.category.add")->method('GET|POST');
$app->get("/admin/blog/category/edit/{id}", 'TestEmbauche\Ctrl\Blog\CategoryCtrl::editAction')->bind("blog.category.edit")->method('GET|POST');
$app->post("/admin/blog/category/delete", 'TestEmbauche\Ctrl\Blog\CategoryCtrl::deleteAction')->bind("blog.category.delete");
//BLOG=>ARTICLE
$app->get("/admin/blog/article/add", 'TestEmbauche\Ctrl\Blog\ArticleCtrl::addAction')->bind("blog.article.add")->method('GET|POST');
$app->get("/admin/blog/article/edit/{id}", 'TestEmbauche\Ctrl\Blog\ArticleCtrl::editAction')->bind("blog.article.edit")->method('GET|POST');
$app->get("/admin/blog/article/delete/{id}", 'TestEmbauche\Ctrl\Blog\ArticleCtrl::deleteAction')->bind("blog.article.delete");
// WORK
$app->get("/admin/realisations/add", 'TestEmbauche\Ctrl\WorkCtrl::addAction')->bind("works.create")->method('GET|POST');
$app->get("/admin/realisations/edit/{id}", 'TestEmbauche\Ctrl\WorkCtrl::editAction')->bind("works.edit")->method('GET|POST');
$app->get("/realisations/show/{id}", 'TestEmbauche\Ctrl\WorkCtrl::showAction')->bind("works.show");
$app->get("/realisations/delete/{id}", 'TestEmbauche\Ctrl\WorkCtrl::deleteAction')->bind("works.delete");