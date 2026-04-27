<?php
namespace App\Tests\Entity;
use App\Entity\Product;
use PHPUnit\Framework\TestCase;
class ProductTest extends TestCase
{
    public function testFood(){
        $p = new Product('produit', 'food', 10);
        $tva = $p->computeTva();
        $this->assertSame(0.55, $tva);
    }

    public function testFood2(){
        $p = new Product('produit', 'Orange', 10);
        $tva = $p->computeTva();
        $this->assertSame(1.96, $tva);
    }

    public function testInvalidPrice(){
        $p = new Product('Pomme', 'Fruit', -5);
        $this->expectException('Exception');
        $p->computeTva();
    }

    

    

    public static function foodProductProvider(): array
    {
        return [
            'price 1'   => [1, 0.055],
            'price 10'  => [10, 0.55],
            'price 20'  => [20, 1.1],
            'price 100' => [100, 5.5],
        ];
    }

    /**
     * @dataProvider foodProductProvider
     */
    public function testComputeTVAForFoodProduct(float $price, float $expectedTVA)
    {
        $product = new Product('Product 1', 'food', $price);
        $TVA = $product->computeTVA();
        $this->assertEquals($expectedTVA, $TVA);
    }



    public function testComputeTVAForFoodProduct2()
    {
        $product = new Product('Product 2', 'bio-food', 10);
        $TVA= $product->computeTVA();
        $this->assertEquals(1.96, $TVA);
    }

    public function testinvalideprices()
    {
        $product = new Product('pomme', 'price',-5);
        $this-> expectException('Exception');
        $product ->computeTVA();
    }
 
}
?>