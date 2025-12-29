<?php

function getProductImage($name){

 $name = strtolower(trim($name));

 $images = [
    
    "Green chili" => "https://images.unsplash.com/photo-1615860767493-6d04ffeed55e?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NzF8fGdyZWVuJTIwY2hpbGl8ZW58MHx8MHx8fDA%3D",
    "Tomato" => "https://images.unsplash.com/photo-1582284540020-8acbe03f4924?q=80&w=735&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
    "Potato" => "https://images.unsplash.com/photo-1518977676601-b53f82aba655?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
    "Onion"  => "https://images.unsplash.com/photo-1618512496248-a07fe83aa8cb?w=700&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8b25pb258ZW58MHx8MHx8fDA%3D",
    "Carrot" => "https://images.unsplash.com/photo-1589927986089-35812388d1f4?w=600",
    "Brinjal"=> "https://images.unsplash.com/photo-1730202452902-3b0fa8d96536?q=80&w=735&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
    "Rice"   => "https://images.unsplash.com/photo-1686820740687-426a7b9b2043?w=700&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OHx8cmljZXxlbnwwfHwwfHx8MA%3D%3D",
    "Wheat"  => "https://images.unsplash.com/photo-1574323347407-f5e1ad6d020b?w=700&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OHx8d2hlYXR8ZW58MHx8MHx8fDA%3D",
    "Corn"   => "https://images.unsplash.com/photo-1634467524884-897d0af5e104?w=700&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8Y29ybnxlbnwwfHwwfHx8MA%3D%3D",
    "Apple"  => "https://images.unsplash.com/photo-1567306226416-28f0efdc88ce?w=600",
    "Banana" => "https://images.unsplash.com/photo-1603833665858-e61d17a86224?w=700&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8YmFuYW5hfGVufDB8fDB8fHww",
    "Grapes" => "https://images.unsplash.com/photo-1632576883732-f131be0be48a?q=80&w=735&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
    "Mango"  => "https://plus.unsplash.com/premium_photo-1674382739389-338645e7dd8c?w=700&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OXx8bWFuZ298ZW58MHx8MHx8fDA%3D",
    "Orange" => "https://images.unsplash.com/photo-1611080626919-7cf5a9dbab5b?w=700&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8b3JhbmdlfGVufDB8fDB8fHww",
    "Peanut"=>"https://plus.unsplash.com/premium_photo-1726072356924-e29e8999df09?w=700&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8cGVhbnV0fGVufDB8fDB8fHww",
    "Bhindi"=>"https://plus.unsplash.com/premium_photo-1666877059056-f42ada662ccc?w=700&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8b2tyYXxlbnwwfHwwfHx8MA%3D%3D",
 ];

 return $images[$name] ?? "https://via.placeholder.com/600x400?text=No+Image";
}
