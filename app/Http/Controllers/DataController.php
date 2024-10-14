namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\YourModel; // Cambia esto por tu modelo real

class DataController extends Controller
{
    public function destroy($id)
    {
        $data = YourModel::find($id);
        
        if ($data) {
            $data->delete();
            return response()->json(['message' => 'Datos eliminados correctamente.'], 200);
        }

        return response()->json(['message' => 'Datos no encontrados.'], 404);
    }
}
