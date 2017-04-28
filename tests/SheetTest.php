<?php
require_once __DIR__ . '/../src/Sheet.php';

class SheetTest extends PHPUnit_Framework_TestCase
{
    protected $sheet;

    protected function setUp()
    {
        $this->sheet = new Sheet();
    }

    public function testThatCellsAreEmptyByDefault()
    {
        $this->assertEquals("", $this->sheet->get("A1"));
        $this->assertEquals("", $this->sheet->get("ZX347"));
    }

    // Implement each test before going to the next one.

    public function testThatTextCellsAreStored()
    {
        $sheet = new Sheet();
        $theCell = "A21";

        $sheet->put($theCell, "A string");
        $this->assertEquals("A string", $sheet->get($theCell));

        $sheet->put($theCell, "A different string");
        $this->assertEquals("A different string", $sheet->get($theCell));

        $sheet->put($theCell, "");
        $this->assertEquals("", $sheet->get($theCell));
    }

// Implement each test before going to the next one; then refactor.

    public function testThatManyCellsExist()
    {
        $sheet = new Sheet();
        $sheet->put("A1", "First");
        $sheet->put("X27", "Second");
        $sheet->put("ZX901", "Third");

        $this->assertEquals("First", $sheet->get("A1"));
        $this->assertEquals("Second", $sheet->get("X27"));
        $this->assertEquals("Third", $sheet->get("ZX901"));

        $sheet->put("A1", "Fourth");
        $this->assertEquals("Fourth", $sheet->get("A1"));
        $this->assertEquals("Second", $sheet->get("X27"));
        $this->assertEquals("Third", $sheet->get("ZX901"));
    }


// Implement each test before going to the next one.
// You can split this test case if it helps.

    public function testThatNumericCellsAreIdentifiedAndStored()
    {
        $sheet = new Sheet();
        $theCell = "A21";

        $sheet->put($theCell, "X99"); // "Obvious" string
        $this->assertEquals("X99", $sheet->get($theCell));

        $sheet->put($theCell, "14"); // "Obvious" number
        $this->assertEquals("14", $sheet->get($theCell));

        $sheet->put($theCell, " 99 X"); // Whole string must be numeric
        $this->assertEquals(" 99 X", $sheet->get($theCell));

        $sheet->put($theCell, " 1234 "); // Blanks ignored
        $this->assertEquals("1234", $sheet->get($theCell));

        $sheet->put($theCell, " "); // Just a blank
        $this->assertEquals(" ", $sheet->get($theCell));
    }

// Refactor before going to each succeeding test.

    public function testThatWeHaveAccessToCellLiteralValuesForEditing()
    {
        $sheet = new Sheet();
        $theCell = "A21";

        $sheet->put($theCell, "Some string");
        $this->assertEquals("Some string", $sheet->getLiteral($theCell));

        $sheet->put($theCell, " 1234 ");
        $this->assertEquals(" 1234 ", $sheet->getLiteral($theCell));

        $sheet->put($theCell, "=7"); // Foreshadowing formulas:)
        $this->assertEquals("=7", $sheet->getLiteral($theCell));
    }


//// We'll talk about "get" and formulas next time.
//

}
