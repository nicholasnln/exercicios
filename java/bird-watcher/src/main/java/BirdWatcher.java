
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
        int[] birdsPerDay = {2, 5, 0, 7, 4};
        int getToday = 0;
        for (int i = 0; i < birdsPerDay.length; i++) {
            getToday = birdsPerDay[i];
        }
        return getToday;
    }

    public void incrementTodaysCount() {
        if (birdsPerDay.length > 0){
            birdsPerDay[birdsPerDay.length]++;
        }
    }

    public boolean hasDayWithoutBirds() {
        throw new UnsupportedOperationException("Please implement the BirdWatcher.hasDayWithoutBirds() method");
    }

    public int getCountForFirstDays(int numberOfDays) {
        throw new UnsupportedOperationException("Please implement the BirdWatcher.getCountForFirstDays() method");
    }

    public int getBusyDays() {
        throw new UnsupportedOperationException("Please implement the BirdWatcher.getBusyDays() method");
    }
}
