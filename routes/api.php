use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CalculatorController;

Route::post('/calculate', [CalculatorController::class, 'calculate']);
