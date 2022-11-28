
/* Ahora procedamos a modificar laclave del usuario mediante el comando ' update ':*/
SET SQL_SAFE_UPDATES = 0;


/*ver ciudad y pais colombia*/
select c.nombreciudad,p.nombrepais from ciudad as c, pais as p where idpais= 41;


SELECT Idproducto, `Tipo`, `Marca`, `Coleccion_Temporada`, `Genero`, `idplacainventario`, `idtalla`, `fecha_creacion`, `ultima_modificacion`, `fecha_eliminacion` 
FROM `producto` WHERE 1

INSERT INTO `producto`(`Idproducto`, `Tipo`, `Marca`, `Coleccion_Temporada`, `Genero`, `idplacainventario`, `idtalla`, `fecha_creacion`, `ultima_modificacion`, `fecha_eliminacion`) 
    VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]','[value-9]','[value-10]');

UPDATE `producto` 
SET `Idproducto`='[value-1]',`Tipo`='[value-2]',`Marca`='[value-3]',`Coleccion_Temporada`='[value-4]',`Genero`='[value-5]',`idplacainventario`='[value-6]',`idtalla`='[value-7]',`fecha_creacion`='[value-8]',`ultima_modificacion`='[value-9]',`fecha_eliminacion`='[value-10]' 
WHERE 1

select * from persona;
select * from pais;