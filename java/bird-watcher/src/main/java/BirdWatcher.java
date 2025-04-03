
class BirdWatcher {
    private final int[] birdsPerDay;

    public BirdWatcher(int[] birdsPerDay) {
        this.birdsPerDay = birdsPerDay.clone();
    }

    public int[] getLastWeek() {
        int[] lastWeek = {0, 2, 5, 3, 7, 8, 4};
        return lastWeek;
    }

    public int getToday() {
        if (birdsPerDay.length == 0) {
            return 0; // Retorna 0 caso o array esteja vazio
        }
        return birdsPerDay[birdsPerDay.length - 1];
    }

    public void incrementTodaysCount() {

        if (birdsPerDay.length > 0){
            birdsPerDay[birdsPerDay.length - 1]++;
        }
    }

    public boolean hasDayWithoutBirds() {
        if (birdsPerDay.length == 0) {
            return true;
        }else
            return false;
    }

    public int getCountForFirstDays(int numberOfDays) {
        return birdsPerDay[numberOfDays - 1];
    }

    public int getBusyDays() {
        throw new UnsupportedOperationException("Please implement the BirdWatcher.getBusyDays() method");
    }
}
