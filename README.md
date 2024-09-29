
# float-spellout
Package for Laravel Developers to Convert Number to Words.
<pre>composer require naimcse56/float-spellout</pre>
Add This in config/app.php
<pre>Naimcse56\FloatSpellout\FloatSpelloutServiceProvider::class</pre>
You can inject the service into your controller and use it to convert float numbers:
<pre>
use Naimcse56\FloatSpellout\Contracts\NumberSpelloutContract;

class NumberController extends Controller
{
    private $spelloutService;

    public function __construct(NumberSpelloutContract $spelloutService)
    {
        $this->spelloutService = $spelloutService;
    }

    public function show($number)
    {
        $spelledOutNumber = $this->spelloutService->convert(floatval($number));
        return response()->json(['spelled_out' => $spelledOutNumber]);
    }
}
</pre>
Or You can also do this below
<pre>
use Vendor\FloatSpellout\Services\FloatNumberSpelloutService;

$service = new FloatNumberSpelloutService();
$result = $service->convert(123.45);

// Output will be 'one hundred twenty-three point four five'
</pre>

