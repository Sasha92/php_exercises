-- Для базы которую мы создавали на занятии (shop) написать следующие запросы
-- 1. На выборку всех категорий верхнего уровня, начинающихся на “je”
-- 2. На выборку всех категорий, имеющих не более трёх подкатегорий следующего уровня (без глубины)
-- 3. На выборку всех категорий нижнего уровня (т.е. не имеющих подкатегорий)

Select name from category where parent_id = 0 and name LIKE  'je%'

SELECT a.parent_id AS 'id', a.name, count(b.id) AS 'count_subcategory'
FROM category a
LEFT JOIN category b ON (a.id = b.parent_id)
GROUP BY a.id
HAVING count_subcategory < 4

Select name from category where id not in (Select parent_id from category where parent_id > 0)