use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChiTietHoaDonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chi_tiet_hoa_dons', function (Blueprint $table) {
            $table->id();
            $table->integer('id_hoa_don');
            $table->integer('soNgayThue');
            $table->enum('daThanhToan', ['Đã', 'Chưa']); // Define enum values here
            $table->timestamp('ngayLapHoaDon');
            $table->bigInteger('thanhTien');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chi_tiet_hoa_dons');
    }
}
